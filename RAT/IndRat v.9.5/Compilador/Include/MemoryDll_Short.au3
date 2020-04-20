

; ============================================================================================================================
;  Functions : MemoryDllOpen(), MemoryDllGetFuncAddress(), MemoryDllClose()
;  Purpose   : Embedding DLL In Scripts to Call Directly From Memory
;  Author    : Ward
;  Modified  : Brian J Christy (Beege) - Wrapper Functions
; ============================================================================================================================
Func MemoryDllOpen($DllBinary)
	Local $Call = __MemoryDllCore(0, $DllBinary)
	Return SetError(@error, 0, $Call)
EndFunc   ;==>MemoryDllOpen

Func MemoryDllGetFuncAddress($hModule, $sFuncName)
	Local $Call = __MemoryDllCore(1, $hModule, $sFuncName)
	Return SetError(@error, 0, $Call)
EndFunc   ;==>MemoryDllGetFuncAddress

Func MemoryDllClose($hModule)
	__MemoryDllCore(2, $hModule)
	Return SetError(@error)
EndFunc   ;==>MemoryDllClose

Func __MemoryDllCore($iCall, ByRef $Mod_Bin, $sFuncName = 0)

	Local Static $_MDCodeBuffer, $_MDLoadLibrary, $_MDGetFuncAddress, $_MDFreeLibrary, $GetProcAddress, $LoadLibraryA, $fDllInit = False

	If Not $fDllInit Then

		If @AutoItX64 Then Exit(MsgBox(16, 'Error - x64', 'x64 Not Supported! ' & @LF & @LF & 'Download newest version for x64 support'))

		Local $Opcode = '0xFFFFFFFFFFFFFFFFB800000000FFE0B800000000FFE0B800000000FFE0B800000000FFE0B800000000FFE0B800000000FFE0B800000000FFE0B800000000FFE0B800000000FFE0B800000000FFE0B800000000FFE0B800000000FFE0B800000000FFE0B800000000FFE0B800000000FFE0B800000000FFE05589E55156578B7D088B750C8B4D10FCF3A45F5E595DC35589E5578B7D088A450C8B4D10F3AA5F5DC359585A5153E8000000005B81EBAB114000898300114000899304114000E8000000005981E9C3114000518B9100114000E80B0000007573657233322E646C6C005850FFD2598B9104114000E80C0000004D657373616765426F784100595150FFD2898372114000E8000000005981E90D124000518B9100114000E80D0000006B65726E656C33322E646C6C005850FFD2598B9104114000E80A0000006C737472636D70694100595150FFD2898309114000E8000000005981E957124000518B9100114000E80D0000006B65726E656C33322E646C6C005850FFD2598B9104114000E80D0000005669727475616C416C6C6F6300595150FFD2898310114000E8000000005981E9A4124000518B9100114000E80D0000006B65726E656C33322E646C6C005850FFD2598B9104114000E80C0000005669727475616C4672656500595150FFD2898317114000E8000000005981E9F0124000518B9100114000E80D0000006B65726E656C33322E646C6C005850FFD2598B9104114000E80F0000005669727475616C50726F7465637400595150FFD289831E114000E8000000005981E93F134000518B9100114000E80D0000006B65726E656C33322E646C6C005850FFD2598B9104114000E80E00000052746C5A65726F4D656D6F727900595150FFD2898325114000E8000000005981E98D134000518B9100114000E80D0000006B65726E656C33322E646C6C005850FFD2598B9104114000E80D0000004C6F61644C6962726172794100595150FFD289832C114000E8000000005981E9DA134000518B9100114000E80D0000006B65726E656C33322E646C6C005850FFD2598B9104114000E80F00000047657450726F634164647265737300595150FFD2898333114000E8000000005981E929144000518B9100114000E80D0000006B65726E656C33322E646C6C005850FFD2598B9104114000E80D00000049734261645265616450747200595150FFD289833A114000E8000000005981E976144000518B9100114000E80D0000006B65726E656C33322E646C6C005850FFD2598B9104114000E80F00000047657450726F636573734865617000595150FFD2898341114000E8000000005981E9C5144000518B9100114000E80D0000006B65726E656C33322E646C6C005850FFD2598B9104114000E80A00000048656170416C6C6F6300'
		$Opcode &= '595150FFD2898348114000E8000000005981E90F154000518B9100114000E80D0000006B65726E656C33322E646C6C005850FFD2598B9104114000E809000000486561704672656500595150FFD289834F114000E8000000005981E958154000518B9100114000E80D0000006B65726E656C33322E646C6C005850FFD2598B9104114000E80C000000476C6F62616C416C6C6F6300595150FFD2898356114000E8000000005981E9A4154000518B9100114000E80D0000006B65726E656C33322E646C6C005850FFD2598B9104114000E80E000000476C6F62616C5265416C6C6F6300595150FFD2898364114000E8000000005981E9F2154000518B9100114000E80D0000006B65726E656C33322E646C6C005850FFD2598B9104114000E80B000000476C6F62616C4672656500595150FFD289835D114000E8000000005981E93D164000518B9100114000E80D0000006B65726E656C33322E646C6C005850FFD2598B9104114000E80C000000467265654C69627261727900595150FFD289836B1140005B59585150E80E04000059C35990585A515250E8CC0500005A5AC35A585250E88E06000059C35589E557565383EC1C8B45108B40048945EC8B55108B020FB750148D740218C745F00000000066837806000F84B0000000837E1000754C8B450C8B583885DB0F8E84000000C744240C04000000C744240800100000895C24048B45EC03460C890424E8FEF9FFFF83EC10894608895C2408C744240400000000890424E864FAFFFFEB46C744240C04000000C7442408001000008B4610894424048B45EC03460C890424E8BDF9FFFF83EC1089C78B55080356148B46108944240889542404893C24E808FAFFFF897E08FF45F083C6288B55108B020FB740063B45F00F8F50FFFFFF8D65F45B5E5F5DC35589E557565383EC1C8B55088B020FB750148D5C0218BF0000000066837806000F84E80000008B432489C2C1EA1D89D683E60189C2C1EA1E83E20189C1C1E91FA9000000027422C7442408004000008B4310894424048B4308890424E822F9FFFF83EC0CE99000000085F6741E85D2740D83F90119D283E2E083C240EB2983F90119D283E29083EA80EB1C85D2740D83F90119D283E2FE83C204EB0B83F90119D283E2F983C208F6432704740681CA000200008B4B1085C97522F6432440740A8B4D088B018B4820EB0EF643248074088B4D088B018B482485C9741D8D45F08944240C89542408894C24048B4308890424E894F8FFFF83EC104783C3288B55088B020FB7400639F80F8F18FFFFFF8D65F45B5E5F5DC35589E557565383EC048B45088B50048955F08B0083B8A400000000745789D30398A0000000833B00744A8B7DF0033B8D4B08BE000000008B430483E808D1E883F80076280FB70189C2C1EA0C25FF0F000083FA037506'
		$Opcode &= '8B550C0114074683C1028B430483E808D1E839F077D8035B04833B0075B683C4045B5E5F5DC35589E557565383EC1CC745F0010000008B45088B40048945EC8B55088B0283B884000000000F84410100008B7DEC03B880000000E9120100008B45EC03470C890424E8BFF7FFFF83EC048945E883F8FF750CC745F000000000E90E0100008B4D0883790800742EC7442408400000008B410C8D048504000000894424048B4108890424E8B6F7FFFF83EC0C8B550889420885C075268B4D088B410C8D04850400000089442404C7042440000000E87EF7FFFF83EC088B55088942088B4D088B510C8B41088B4DE8890C908B4508FF400C833F0074168B5DEC031F8B75EC037710EB11C745F000000000EB578B5DEC035F1089DE833B00744A833B0079190FB703894424048B55E8891424E8FEF6FFFF83EC088906EB1C8B45EC030383C002894424048B4DE8890C24E8E0F6FFFF83EC088906833E0074AB83C30483C604833B0075B6837DF000742483C714C744240414000000893C24E8B9F6FFFF83EC0885C0750A837F0C000F85CDFEFFFF8B45F08D65F45B5E5F5DC35589E557565383EC1C8B45088945F0B8000000008B550866813A4D5A0F85A20100008B75088B45F003703CB800000000813E504500000F8588010000C744240C04000000C7442408002000008B4650894424048B4634890424E815F6FFFF83EC1089C785C07535C744240C04000000C7442408002000008B465089442404C7042400000000E8E9F5FFFF83EC1089C7B80000000085FF0F8428010000E803F6FFFFC744240814000000C744240400000000890424E8F2F5FFFF83EC0C89C3897804C7400C00000000C7400800000000C7401000000000C744240C04000000C7442408001000008B465089442404893C24E87EF5FFFF83EC10C744240C04000000C7442408001000008B465489442404893C24E85CF5FFFF83EC108945EC8B55F08B423C03465489442408895424048B45EC890424E8A3F5FFFF8B45EC8B55F003423C8903897834895C2408897424048B4508890424E8B4FAFFFF89F82B4634740C89442404891C24E8A0FCFFFF891C24E814FDFFFF85C0743E891C24E876FBFFFF8B0383782800742A89FA0350287427C744240800000000C744240401000000893C24FFD283EC0C85C0740BC743100100000089D8EB0D891C24E8DB000000B8000000008D65F45B5E5F5DC35589E583EC28895DF48975F8897DFC8B45088B50048955F0C745ECFFFFFFFF8B1083C278B800000000837A04000F848E0000008B5DF0031A837B18007406837B1400750FB800000000EB760FB73F897DECEB458B75F00373208B7DF0037B24C745E800000000837B1800762C8B45F00306894424048B450C890424E820F4FFFF83EC0885C074C4FF45E883C60483C7028B55E839531877'
		$Opcode &= 'D4B800000000837DECFF741EB8000000008B55EC3B531477118B45ECC1E00203431C8B55F003141089D08B5DF48B75F88B7DFC89EC5DC35589E5565383EC108B750885F60F84AC000000837E1000742A8B068B56048B48288D040AC744240800000000C744240400000000891424FFD083EC0CC7461000000000837E08007436BB00000000837E0C007E1D8B4608833C98FF740E8B0498890424E8CCF3FFFF83EC0443395E0C7FE38B4608890424E8AAF3FFFF83EC04837E0400741EC744240800800000C7442404000000008B4604890424E840F3FFFF83EC0CE862F3FFFF89742408C744240400000000890424E85CF3FFFF83EC0C8D65F85B5E5DC3'

		$_MDCodeBuffer = DllStructCreate("byte[" & BinaryLen($Opcode) & "]")
		DllCall("kernel32.dll", "bool", "VirtualProtect", "struct*", $_MDCodeBuffer, "dword_ptr", DllStructGetSize($_MDCodeBuffer), "dword", 0x00000040, "dword*", 0) ; PAGE_EXECUTE_READWRITE

		DllStructSetData($_MDCodeBuffer, 1, $Opcode)

		Local $pMDCodeBuffer = DllStructGetPtr($_MDCodeBuffer)
		$_MDLoadLibrary = $pMDCodeBuffer + (StringInStr($Opcode, "59585A51") - 1) / 2 - 1
		$_MDGetFuncAddress = $pMDCodeBuffer + (StringInStr($Opcode, "5990585A51") - 1) / 2 - 1
		$_MDFreeLibrary = $pMDCodeBuffer + (StringInStr($Opcode, "5A585250") - 1) / 2 - 1

		Local $Ret = DllCall("kernel32.dll", "hwnd", "LoadLibraryA", "str", "kernel32.dll")
		$GetProcAddress = DllCall("kernel32.dll", "uint", "GetProcAddress", "hwnd", $Ret[0], "str", "GetProcAddress")
		$LoadLibraryA = DllCall("kernel32.dll", "uint", "GetProcAddress", "hwnd", $Ret[0], "str", "LoadLibraryA")

		$fDllInit = True
	EndIf

	Switch $iCall
		Case 0; DllOpen
			Local $DllBuffer = DllStructCreate("byte[" & BinaryLen($Mod_Bin) & "]")
			DllCall("kernel32.dll", "bool", "VirtualProtect", "struct*", $DllBuffer, "dword_ptr", DllStructGetSize($DllBuffer), "dword", 0x00000040, "dword*", 0) ; PAGE_EXECUTE_READWRITE
			DllStructSetData($DllBuffer, 1, $Mod_Bin)
			Local $Module = DllCallAddress('uint', $_MDLoadLibrary, "uint", $LoadLibraryA[0], "uint", $GetProcAddress[0], "struct*", $DllBuffer)
			If $Module[0] = 0 Then Return SetError(1, 0, 0)
			Return $Module[0]
		Case 1; MemoryDllGetFuncAddress
			Local $Address = DllCallAddress("uint", $_MDGetFuncAddress, "uint", $Mod_Bin, "str", $sFuncName)
			If $Address[0] = 0 Then Return SetError(1, 0, 0)
			Return $Address[0]
		Case 2; DllClose
			Return DllCallAddress('none', $_MDFreeLibrary, "uint", $Mod_Bin)
	EndSwitch

EndFunc   ;==>__MemoryDllCore
; ============================================================================================================================
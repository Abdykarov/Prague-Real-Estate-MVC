<?php
$sachovnice = null;
if (!empty($_POST["pole"])){
    $sachovnice = $_POST["pole"];

    $kameny = array(
        $B1 = $sachovnice[41],
        $D1 = $sachovnice[49],
        $F1 = $sachovnice[57],
        $H1 = $sachovnice[65],

        $A2 = $sachovnice[107],
        $C2 = $sachovnice[115],
        $E2 = $sachovnice[123],
        $G2 = $sachovnice[131],

        $B3 = $sachovnice[181],
        $D3 = $sachovnice[189],
        $F3 = $sachovnice[197],
        $H3 = $sachovnice[205],

        $A4 = $sachovnice[247],
        $C4 = $sachovnice[255],
        $E4 = $sachovnice[263],
        $G4 = $sachovnice[271],

        $B5 = $sachovnice[321],
        $D5 = $sachovnice[329],
        $F5 = $sachovnice[337],
        $H5 = $sachovnice[345],

        $A6 = $sachovnice[387],
        $C6 = $sachovnice[395],
        $E6 = $sachovnice[403],
        $G6 = $sachovnice[411],

        $B7 = $sachovnice[461],
        $D7 = $sachovnice[469],
        $F7 = $sachovnice[477],
        $H7 = $sachovnice[485],

        $A8 = $sachovnice[527],
        $C8 = $sachovnice[535],
        $E8 = $sachovnice[543],
        $G8 = $sachovnice[551],
    );
}
//$hraciPole = [
//    $_GET["b1"],
//    $_GET["d1"],
//    $_GET["f1"],
//    $_GET["h1"],
//
//    $_GET["a2"],
//    $_GET["c2"],
//    $_GET["e2"],
//    $_GET["g2"],
//
//    $_GET["b3"],
//    $_GET["d3"],
//    $_GET["f3"],
//    $_GET["h3"],
//
//    $_GET["a4"],
//    $_GET["c4"],
//    $_GET["e4"],
//    $_GET["g4"],
//
//    $_GET["b5"],
//    $_GET["d5"],
//    $_GET["f5"],
//    $_GET["h5"],
//
//    $_GET["a6"],
//    $_GET["c6"],
//    $_GET["e6"],
//    $_GET["g6"],
//
//    $_GET["b7"],
//    $_GET["d7"],
//    $_GET["f7"],
//    $_GET["h7"],
//
//    $_GET["a8"],
//    $_GET["c8"],
//    $_GET["e8"],
//    $_GET["g8"],
//
//];


//var_dump($kameny);



function isWhite($kamen){
    if ($kamen == "W") {
        return 'selected="selected"';
    }
    else{
        return null;
    }
}
function isBlack($kamen){
    if ($kamen == "B") {
        return 'selected="selected"';
    }
    else{
        return null;
    }
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dáma</title>
    <style>
        textarea{
            width: 350px;
            height: 300px;
        }
        .whiteSpace{
            width:45px;
            height:45px;
        }
        .table{
            border: solid;
        }
        table, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th{
            width:45px;
            height:45px;
        }

    </style>
</head>
<body>

<h1> Dama </h1>
<form method="get">
    <table >
        <thead>
            <tr>
                <td>&nbsp;</td>
                <th>A</th><th>B</th><th>C</th><th>D</th><th>E</th><th>F</th><th>G</th><th>H</th>
            </tr>
        </thead>

        <tbody class="table">
            <tr>
                <th>1</th>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="b1" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;" >
                            <option value="S"  > </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){ echo isWhite($kameny[0]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[0]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="d1" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">

                            <option value="S" >  </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){ echo isWhite($kameny[1]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[1]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="f1" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){ echo isWhite($kameny[2]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[2]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="h1" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[3]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[3]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
            </tr>

            <tr>
                <th>2</th>
                <td>
                    <label>
                        <select id="a2" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[4]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[4]);}?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="c2" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[5]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[5]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="e2" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[6]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[6]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="g2" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[7]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[7]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>

            </tr>
            <tr>
                <th>3</th>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="b3" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[8]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[8]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="d3" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[9]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[9]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="f3" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[10]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[10]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="h3" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){ echo isWhite($kameny[11]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[11]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
            </tr>

            <tr>
                <th>4</th>
                <td>
                    <label>
                        <select id="a4" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[12]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[12]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="c4" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){ echo isWhite($kameny[13]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[13]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="e4" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[14]); }?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[14]); }?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="g4" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[15]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[15]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>

            </tr>
            <tr>
                <th>5</th>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="b5" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[16]); }?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[16]); }?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="d5" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[17]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[17]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="f5" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[18]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){ echo isBlack($kameny[18]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="h5" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){ echo isWhite($kameny[19]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php  if (!empty($_POST["pole"])){echo isBlack($kameny[19]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
            </tr>

            <tr>
                <th>6</th>
                <td>
                    <label>
                        <select id="a6" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[20]); }?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[20]); }?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="c6" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[21]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[21]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="e6" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[22]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[22]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="g6" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php  if (!empty($_POST["pole"])){echo isWhite($kameny[23]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[23]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>

            </tr>
            <tr>
                <th>7</th>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="b7" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[24]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[24]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="d7" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[25]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[25]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="f7" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[26]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){ echo isBlack($kameny[26]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="h7" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[27]); }?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){ echo isBlack($kameny[27]); }?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
            </tr>

            <tr>
                <th>8</th>
                <td>
                    <label>
                        <select id="a8" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[28]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[28]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="c8" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="S"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[29]); }?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[29]); }?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="e8" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">
                            <option value="Sa"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[30]);} ?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[30]);} ?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>
                <td>
                    <label>
                        <select id="g8" name="select" style="color:black;width:45px; height:45px; background-color:rgb(166,166,166);border:1px solid black;">

                            <option value="end"> </option>
                            <option value="W" <?php if (!empty($_POST["pole"])){echo isWhite($kameny[31]); }?> style="background-color: rgb(166,166,166); color:white">  W</option>
                            <option value="B" <?php if (!empty($_POST["pole"])){echo isBlack($kameny[31]); }?> style="background-color: rgb(166,166,166); color:black">  B</option>
                        </select>
                    </label>
                </td>
                <td class="whiteSpace">&nbsp;</td>

            </tr>
        </tbody>
    </table>
</form>

<br>
<form method="post">
<label> Zadejte vstupni format: <br>
    <textarea id="pole" name="pole"><?php echo $sachovnice; ?></textarea><br>
    <button type="submit" name="submit"> odeslat </button>
</label>
</form>


<script>
    let textarea = document.querySelector("#pole").value
    let textareaInput = document.querySelector("#pole")

    let kameny = [
        document.querySelector("#b1"),
        document.querySelector("#d1"),
        document.querySelector("#f1"),
        document.querySelector("#h1"),

        document.querySelector("#a2"),
        document.querySelector("#c2"),
        document.querySelector("#e2"),
        document.querySelector("#g2"),

        document.querySelector("#b3"),
        document.querySelector("#d3"),
        document.querySelector("#f3"),
        document.querySelector("#h3"),

        document.querySelector("#a4"),
        document.querySelector("#c4"),
        document.querySelector("#e4"),
        document.querySelector("#g4"),

        document.querySelector("#b5"),
        document.querySelector("#d5"),
        document.querySelector("#f5"),
        document.querySelector("#h5"),

        document.querySelector("#a6"),
        document.querySelector("#c6"),
        document.querySelector("#e6"),
        document.querySelector("#g6"),

        document.querySelector("#b7"),
        document.querySelector("#d7"),
        document.querySelector("#f7"),
        document.querySelector("#h7"),

        document.querySelector("#a8"),
        document.querySelector("#c8"),
        document.querySelector("#e8"),
        document.querySelector("#g8"),


    ]
    let pozice = [
        40,
        48,
        56,
        64,

        104,
        112,
        120,
        128,

        176,
        184,
        192,
        200,

        240,
        248,
        256,
        264,

        312,
        320,
        328,
        336,

        376,
        384,
        392,
        400,

        448,
        456,
        464,
        472,

        512,
        520,
        528,
        536,
    ]


    function replaceAt(string, index, replace) {
        return string.substring(0, index) + replace + string.substring(index + 1);
    }

    function newTextarea(i) {
        let symbol = kameny[i].value
        if (symbol == "W"){
            textareaInput.value = replaceAt(textarea, pozice[i], symbol);
        }else if (symbol == "B"){
            textareaInput.value = replaceAt(textarea, pozice[i], symbol);
        }else{
            symbol = " ";
            textareaInput.value = replaceAt(textarea, pozice[i], symbol);
        }
        textarea = textareaInput.value

    }

    kameny[0].addEventListener("change", function () {newTextarea(0);});
    kameny[1].addEventListener("change", function () {newTextarea(1);});
    kameny[2].addEventListener("change", function () {newTextarea(2);});
    kameny[3].addEventListener("change", function () {newTextarea(3);});
    kameny[4].addEventListener("change", function () {newTextarea(4);});
    kameny[5].addEventListener("change", function () {newTextarea(5);});
    kameny[6].addEventListener("change", function () {newTextarea(6);});
    kameny[7].addEventListener("change", function () {newTextarea(7);});
    kameny[8].addEventListener("change", function () {newTextarea(8);});
    kameny[9].addEventListener("change", function () {newTextarea(9);});
    kameny[10].addEventListener("change", function () {newTextarea(10);});
    kameny[11].addEventListener("change", function () {newTextarea(11);});
    kameny[12].addEventListener("change", function () {newTextarea(12);});
    kameny[13].addEventListener("change", function () {newTextarea(13);});
    kameny[14].addEventListener("change", function () {newTextarea(14);});
    kameny[15].addEventListener("change", function () {newTextarea(15);});
    kameny[16].addEventListener("change", function () {newTextarea(16);});
    kameny[17].addEventListener("change", function () {newTextarea(17);});
    kameny[18].addEventListener("change", function () {newTextarea(18);});
    kameny[19].addEventListener("change", function () {newTextarea(19);});
    kameny[20].addEventListener("change", function () {newTextarea(20);});
    kameny[21].addEventListener("change", function () {newTextarea(21);});
    kameny[22].addEventListener("change", function () {newTextarea(22);});
    kameny[23].addEventListener("change", function () {newTextarea(23);});
    kameny[24].addEventListener("change", function () {newTextarea(24);});
    kameny[25].addEventListener("change", function () {newTextarea(25);});
    kameny[26].addEventListener("change", function () {newTextarea(26);});
    kameny[27].addEventListener("change", function () {newTextarea(27);});
    kameny[28].addEventListener("change", function () {newTextarea(28);});
    kameny[29].addEventListener("change", function () {newTextarea(29);});
    kameny[30].addEventListener("change", function () {newTextarea(30);});
    kameny[31].addEventListener("change", function () {newTextarea(31);});








</script>
</body>
</html>

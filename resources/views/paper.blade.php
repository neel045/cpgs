<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>paper</title>

    <style>
        .bold{
            font-weight: bold;
        }
        .marks{
            float: right;
            font-weight: 900;
        }
        .center{
            text-align: center;
            font-weight: bold;
        }
        .right{
            float: right;
        }
    </style>
</head>
<body>

    <div>
        <span class="bold right">Subject: {{$questions[3]}}</span>
        <span class="bold">Subject Code: {{$questions[0][0]->subject_code}}</span>
    </div>
    <div>
        <span class="bold">Total Marks: 70</span>
    </div>

    <div>
        <br>
        <span class="bold">Q. 1</span>
        <div>
            <span>
                a) {{$questions[0][0]->question}}
            </span>
            <span class="marks">0{{$questions[0][0]->marks}}</span>
            <br>
            <span>
                b) {{$questions[1][0]->question}}
            </span>
            <span class="marks">0{{$questions[1][0]->marks}}</span>
            <br>
            <span>
                c) {{$questions[2][0]->question}}
            </span>
            <span class="marks">0{{$questions[2][0]->marks}}</span>
        </div>
    </div>

    <br>

    <div>
        <br>
        <span class="bold">Q. 2</span>
        <div>
            <span>
                a) {{$questions[0][1]->question}}
            </span>
            <span class="marks">0{{$questions[0][1]->marks}}</span>
            <br>
            <span>
                b) {{$questions[1][1]->question}}
            </span>
            <span class="marks">0{{$questions[1][1]->marks}}</span>
            <br>
            <span>
                c) {{$questions[2][1]->question}}
            </span>
            <span class="marks">0{{$questions[2][1]->marks}}</span>
            <br>
            <div class="center">OR</div>
            <span>
                c) {{$questions[2][2]->question}}
            </span>
            <span class="marks">0{{$questions[2][2]->marks}}</span>
        </div>
    </div>


    <div>
        <br>
        <span class="bold">Q. 3</span>
        <div>
            <span>
                a) {{$questions[0][2]->question}}
            </span>
            <span class="marks">0{{$questions[0][2]->marks}}</span>
            <br>
            <span>
                b) {{$questions[1][2]->question}}
            </span>
            <span class="marks">0{{$questions[1][2]->marks}}</span>
            <br>
            <span>
                c) {{$questions[2][3]->question}}
            </span>
            <span class="marks">0{{$questions[2][3]->marks}}</span>

        </div>
    </div>

    <div class="center">OR</div>

    <div>
        <br>
        <span class="bold">Q. 3</span>
        <div>
            <span>
                a) {{$questions[0][3]->question}}
            </span>
            <span class="marks">0{{$questions[0][3]->marks}}</span>
            <br>
            <span>
                b) {{$questions[1][3]->question}}
            </span>
            <span class="marks">0{{$questions[1][3]->marks}}</span>
            <br>
            <span>
                c) {{$questions[2][4]->question}}
            </span>
            <span class="marks">0{{$questions[2][4]->marks}}</span>
        </div>
    </div>
    <div>
        <br>
        <span class="bold">Q. 4</span>
        <div>
            <span>
                a) {{$questions[0][4]->question}}
            </span>
            <span class="marks">0{{$questions[0][4]->marks}}</span>
            <br>
            <span>
                b) {{$questions[1][4]->question}}
            </span>
            <span class="marks">0{{$questions[1][4]->marks}}</span>
            <br>
            <span>
                c) {{$questions[2][5]->question}}
            </span>
            <span class="marks">0{{$questions[2][5]->marks}}</span>
        </div>
    </div>

    <div class="center">OR</div>

    <div>
        <br>
        <span class="bold">Q. 4</span>
        <div>
            <span>
                a) {{$questions[0][5]->question}}
            </span>
            <span class="marks">0{{$questions[0][5]->marks}}</span>
            <br>
            <span>
                b) {{$questions[1][5]->question}}
            </span>
            <span class="marks">0{{$questions[1][5]->marks}}</span>
            <br>
            <span>
                c) {{$questions[2][6]->question}}
            </span>
            <span class="marks">0{{$questions[2][6]->marks}}</span>

        </div>
    </div>

    <div>
        <br>
        <span class="bold">Q. 5</span>
        <div>
            <span>
                a) {{$questions[0][6]->question}}
            </span>
            <span class="marks">0{{$questions[0][6]->marks}}</span>
            <br>
            <span>
                b) {{$questions[1][6]->question}}
            </span>
            <span class="marks">0{{$questions[1][6]->marks}}</span>
            <br>
            <span>
                c) {{$questions[2][7]->question}}
            </span>
            <span class="marks">0{{$questions[2][7]->marks}}</span>

        </div>
    </div>
    <div class="center">OR</div>
    <div>
        <br>
        <span class="bold">Q. 5</span>
        <div>
            <span>
                a) {{$questions[0][7]->question}}
            </span>
            <span class="marks">0{{$questions[0][7]->marks}}</span>
            <br>
            <span>
                b) {{$questions[1][7]->question}}
            </span>
            <span class="marks">0{{$questions[1][7]->marks}}</span>
            <br>
            <span>
                c) {{$questions[2][8]->question}}
            </span>
            <span class="marks">0{{$questions[2][8]->marks}}</span>
        </div>
    </div>
</body>
</html>

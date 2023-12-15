<html>

<head>
    <style>
        body {
            margin-top: 20px;
        }

        .bg-light-gray {
            background-color: #f7f7f7;
        }

        .table-bordered thead td,
        .table-bordered thead th {
            border-bottom-width: 2px;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
        }


        .bg-sky.box-shadow {
            box-shadow: 0px 5px 0px 0px #00a2a7
        }

        .bg-orange.box-shadow {
            box-shadow: 0px 5px 0px 0px #af4305
        }

        .bg-green.box-shadow {
            box-shadow: 0px 5px 0px 0px #4ca520
        }

        .bg-yellow.box-shadow {
            box-shadow: 0px 5px 0px 0px #dcbf02
        }

        .bg-pink.box-shadow {
            box-shadow: 0px 5px 0px 0px #e82d8b
        }

        .bg-purple.box-shadow {
            box-shadow: 0px 5px 0px 0px #8343e8
        }

        .bg-lightred.box-shadow {
            box-shadow: 0px 5px 0px 0px #d84213
        }


        .bg-sky {
            background-color: #02c2c7
        }

        .bg-orange {
            background-color: #e95601
        }

        .bg-green {
            background-color: #5bbd2a
        }

        .bg-yellow {
            background-color: #f0d001
        }

        .bg-pink {
            background-color: #ff48a4
        }

        .bg-purple {
            background-color: #9d60ff
        }

        .bg-lightred {
            background-color: #ff5722
        }

        .padding-15px-lr {
            padding-left: 15px;
            padding-right: 15px;
        }

        .padding-5px-tb {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .margin-10px-bottom {
            margin-bottom: 10px;
        }

        .border-radius-5 {
            border-radius: 5px;
        }

        .margin-10px-top {
            margin-top: 10px;
        }

        .font-size14 {
            font-size: 14px;
        }

        .text-light-gray {
            color: #d6d5d5;
        }

        .font-size13 {
            font-size: 13px;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .table td,
        .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
    </style>

<body>
    <script>
        var timetable = new Array();
        timetable = JSON.parse(sessionStorage.getItem('timetable'));
        //alert(timetable);
        console.log(timetable);
    </script>
    <div class="container">
        <div class="timetable-img text-center">
            <img src="img/content/timetable.png" alt="">
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-light-gray">
                        <th class="text-uppercase">Time
                        </th>
                        <th class="text-uppercase">9.00-9.55</th>
                        <th class="text-uppercase">9.55-10.50</th>
                        <th class="text-uppercase">11.10-12.05</th>
                        <th class="text-uppercase">12.05-1.00</th>
                        <th class="text-uppercase">1.00-2.00</th>
                        <th class="text-uppercase">2.00-3.00</th>
                        <th class="text-uppercase">3.00-4.00</th>
                        <th class="text-uppercase">4.00-5.00</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle">Monday</td>
                        <td>
                            <script>
                                document.write(timetable[0][0]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[0][1]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[0][2]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[0][3]);
                            </script>
                        </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td class="align-middle">Tuesday</td>
                        <td>
                            <script>
                                document.write(timetable[1][0]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[1][1]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[1][2]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[1][3]);
                            </script>
                        </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td></td>

                    </tr>

                    <tr>
                        <td class="align-middle">Wednesday</td>
                        <td>
                            <script>
                                document.write(timetable[2][0]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[2][1]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[2][2]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[2][3]);
                            </script>
                        </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td></td>

                    </tr>

                    <tr>
                        <td class="align-middle">Thursday</td>
                        <td>
                            <script>
                                document.write(timetable[3][0]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[3][1]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[3][2]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[3][3]);
                            </script>
                        </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="align-middle">Friday</td>
                        <td>
                            <script>
                                document.write(timetable[4][0]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[4][1]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[4][2]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[4][3]);
                            </script>
                        </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td class="align-middle">Saturday</td>
                        <td>
                            <script>
                                document.write(timetable[5][0]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[5][1]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[5][2]);
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(timetable[5][3]);
                            </script>
                        </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td></td>
                    </tr>

                    </tr>

                    <tr>
                        <td class="align-middle">Sunday</td>
                        <td>
                            <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray">James Smith</div>
                        </td>
                        <td>
                            <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>
                        <td>
                            <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>


                        <td>
                            <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray">James Smith</div>
                        </td>
                        <td>
                            <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">LUNCH BREAK</span>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>

                        </td>
                        <td>
                            <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>

                        <td>
                            <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>

                        <td>
                            <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>
                    </tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Xem bài giảng</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../views/Admin/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style>
        .fa-eye:hover{
            cursor:pointer;
        }
        .information{
            display: none;
        }
        .lesson{
            margin-top: 25px;
        }
        input{
            margin-top: 10px;
        }
        .btn{
            margin-top: 10px;
        }
        .radios{
            margin-top: 5px;
            margin-bottom: 5px;
            display: flex;
            height: 37px;

        }
        .radios input{
           padding-top: 5px;
        }
        .action{
            display: flex;
            justify-content: space-around;
        }
        .is-active{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
        .addLesson{
            display: none;
        }
        .save{
            display: none;
        }
    </style>

</head>

<body>
    <div class="wrapper">


        <?php require_once "./views/Admin/components/sidebar.php";?>

        <!-- Page Content  -->
        <div id="content">

            <?php require_once "./views/Admin/components/nav.php";?>


            <select class="custom-select category" name="category" id="category">
                <option selected >Chọn loại khóa học</option>
            <?php foreach($data['category'] as $index){ ?>
                <option value="<?=$index['id']?>"><?=$index['name']?></option>

                <?php } ?>
            </select>
            <hr>
            <select class="custom-select course" name="course" id="course">
                <option selected value="-1">Chọn khóa học</option>

            </select>
            <div class="lesson">
                <div class="col-md-3">  <a href="" class="btn btn-danger addLesson">Thêm mới</a></div>
                <div class="alert alert-danger alert-1" role="alert" style="display: none">
                    Bạn không có quyền thêm mới bài giảng
                </div>
                <div class="alert alert-danger alert-2" role="alert" style="display: none">
                    Bạn không có quyền xem bài giảng
                </div>
                <form action="editLesson" method="post">

                    <table class="table table-borderless">

                        <thead>
                        <tr>

                            <th scope="col"><p>Tên bài giảng</p></th>
                            <th scope="col"><p>Video</p></th>
                            <th scope="col " class="is-active" >
                                <p>Hoạt động</p>
                                <p>Không hoạt động</p>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>




                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-primary save">Lưu thay đổi</button>
                </form>
            </div>

    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->

    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script >

        $(document).ready(function () {


            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');

            });


            $(".category").change(function () {
                var elementOption=document.querySelectorAll("#course  option");
                for(let i of elementOption){
                  if (i.value != -1) i.remove();
                }
                var category_id=$(this).val();
               $.ajax({
                   type:"POST",
                   url:"showCourse",
                   data:{
                       category_id,
                   },
                   success: function (data) {

                       var course=JSON.parse(data);
                      for(let i of course){
                         var option=document.createElement("option");
                         option.value=i['id'];
                         option.innerHTML=i['name'];
                         document.getElementById("course").appendChild(option);

                      }

                   }
               })
            })
            $(".course").change(function () {
                var elementTR=document.querySelectorAll("tbody tr");
               for(let i of elementTR){

                   i.remove();
               }
                document.querySelector(".addLesson").style.display="block";

                var lesson_id=$(this).val();
                $.ajax({
                    type: "POST",
                    url: "getLesson",
                    data:{
                        lesson_id
                    },
                    success: function (data) {
                        if (data != 0) {
                            var lesson=JSON.parse(data);

                            for(let i of lesson){
                                document.querySelector(".save").style.display="block";
                                let tr=document.createElement("tr");
                                let td1=document.createElement("td");
                                let td2=document.createElement("td");
                                let td3=document.createElement("td");
                                td3.className="action";
                                let input1=document.createElement("input");
                                input1.className="form-control";
                                input1.value=i['name'];
                                input1.name="name-"+i['id'];
                                let input2=document.createElement("input");
                                input2.className="form-control";
                                input2.value=i['video'];
                                input2.name="video-"+i['id'];
                                let choice1=document.createElement("input");
                                choice1.type="radio";
                                choice1.name="is_active-"+i['id'];
                                choice1.value=1;
                                let choice2=document.createElement("input");
                                choice2.type="radio";
                                choice2.name="is_active-"+i['id'];
                                if (i['is_active'] == 1) choice1.checked=true;
                                else choice2.checked=true;
                                choice2.value=0;

                                document.querySelector("tbody").appendChild(tr);
                                td1.appendChild(input1);
                                td2.appendChild(input2);
                                td3.appendChild(choice1);
                                td3.appendChild(choice2);
                                tr.appendChild(td1);
                                tr.appendChild(td2);
                                tr.appendChild(td3);



                            }
                        } else{
                            document.querySelector(".alert-2").style.display="block";
                            document.getElementsByTagName("thead")[0].style.display="none";
                        }
                    }
                })
            })
            $(".addLesson").click(function (event) {
                event.preventDefault();
                let id_course=document.getElementById("course").value;

                $.ajax({
                    type:"POST",
                    url: "addLesson",
                    data:{
                        id_course,
                    },
                    success:function (data) {
                       if (data != 0){
                           document.querySelector(".save").style.display="block";
                           let id=data;
                           let tr=document.createElement("tr");
                           let td1=document.createElement("td");
                           let td2=document.createElement("td");
                           let td3=document.createElement("td");
                           td3.className="action";
                           let input1=document.createElement("input");
                           input1.className="form-control";

                           input1.name="name-"+id;
                           let input2=document.createElement("input");
                           input2.className="form-control";

                           input2.name="video-"+id;
                           let choice1=document.createElement("input");
                           choice1.type="radio";
                           choice1.name="is_active-"+id;
                           choice1.value=1;

                           let choice2=document.createElement("input");
                           choice2.type="radio";
                           choice2.name="is_active-"+id;
                           choice2.value=0;

                           document.querySelector("tbody").appendChild(tr);
                           td1.appendChild(input1);
                           td2.appendChild(input2);
                           td3.appendChild(choice1);
                           td3.appendChild(choice2);
                           tr.appendChild(td1);
                           tr.appendChild(td2);
                           tr.appendChild(td3);
                       } else{
                           document.querySelector(".alert-1").style.display="block";
                       }
                    }
                })
            })




        });

    </script>

</body>

</html>
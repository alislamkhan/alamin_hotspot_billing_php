$(window).ready(function (){

  date = new Date();
  day = date.getDate();
  month = date.getMonth()+1;
  if (month < 10) {
    month = "0" + month;
  }
  year = date.getFullYear();
  currentdate = year+"-"+month+"-"+day;

  $(document).keydown(function(event) {
    if (event.which === 13){
      sendsms();
      sendit();
      event.preventDefault();
    }
  });

  $(document).on("click",".sendbtn",function(){
    sendsms();
    sendit();
  })
  function sendit(){
    customername = $(".inputname").val();
    customermobile = $(".inputmobile").val();
    customeramount = $(".inputamount").val();
    if ($(".inputpaid").is(":checked")) {
      paidstatus = "cash";
    }else{
      paidstatus = "due";
    }
    $.ajax({
      url:"sendit.php",
      method:"POST",
      async:false,
      data:{customername:customername,customermobile:customermobile,customeramount:customeramount,paidstatus:paidstatus},
      success:function(data){
        console.log("send success");
        availableid();
        cashsalesid();
        duesalesid();
        document.getElementById('name').value = '';
        document.getElementById('mobile').value = '';
        document.getElementById('amount').value = '';
        $("#paid").prop("checked", false);
        $(".notititle").text("Id sent successfully.");
        $("#notification").removeClass("notification");
        $("#notification").addClass("notificationon");
        setTimeout(function(){
          $("#notification").removeClass("notificationon");
          $("#notification").addClass("notification");
        }, 3000);
      }
    })
  }

  function sendsms(){
    customername = $(".inputname").val();
    customermobile = $(".inputmobile").val();
    customeramount = $(".inputamount").val();
    
    if ($(".inputpaid").is(":checked")) {
      paidstatus = "cash";
    }else{
      paidstatus = "due";
    }
    
    lenth = customermobile.length;
    if (lenth < 11) {
      console.log("without sms");
    }else{
      $.ajax({
        url:"sendsms.php",
        method:"POST",
        async:false,
        data:{customername:customername,customermobile:customermobile,customeramount:customeramount,paidstatus:paidstatus},
        success:function(data){
          console.log(data);
        }
      })
    }
  }

  availableid();
  function availableid(){
    $.ajax({
      url:"availableid.php",
      method:"POST",
      async:false,
      success:function(data){
        $(".availableidlist").html(data);
        console.log("success");
      }
    })
  }

  cashsalesidsearch = " ";
  cashfrom = "2022-01-01";
  cashto = currentdate;
  $(".cashfrom").val(cashfrom);
  $(".cashto").val(cashto);
  cashsalesid();
  $(document).on("keyup",".cashsalesidsearch",function(){
    cashsalesidsearch = $(".cashsalesidsearch").val();
    cashsalesid();
  })
  $(document).on("change",".cashfrom",function(){
    cashfrom = $(".cashfrom").val();
    cashsalesid();
  })
  $(document).on("change",".cashto",function(){
    cashto = $(".cashto").val();
    cashsalesid();
  })
  function cashsalesid(){
    $.ajax({
      url:"cashsales.php",
      method:"POST",
      async:false,
      data:{cashsalesidsearch:cashsalesidsearch,cashfrom:cashfrom,cashto:cashto},
      success:function(data){
        $(".cashsalesidlist").html(data);
        console.log("success");
      }
    })
  }

  $(document).on("click","#updatecash",function(){
    updateid = $(this).data("id");
    $.ajax({
      url:"updatecash.php",
      method:"POST",
      async:false,
      data:{updateid:updateid},
      success:function(data){
        cashsalesid();
        duesalesid();
        $(".notititle").text("Data updated successfully.");
        $("#notification").removeClass("notification");
        $("#notification").addClass("notificationon");
        setTimeout(function(){
          $("#notification").removeClass("notificationon");
          $("#notification").addClass("notification");
        }, 3000);
      }
    })
  })

  $(document).on("click",".cashexportbtn",function(){
    cashexport();
  })

  function cashexport(){
    $.ajax({
      url:"cashexport.php",
      method:"POST",
      async:false,
      data:{cashsalesidsearch:cashsalesidsearch,cashfrom:cashfrom,cashto:cashto},
      success:function(data){
        $(".downloadcontainer").css("display","flex");
        $(".fileuploadbtn").css("display","none");
        $(".notititle").text("Data exported successfully.");
        $("#notification").removeClass("notification");
        $("#notification").addClass("notificationon");
        setTimeout(function(){
          $("#notification").removeClass("notificationon");
          $("#notification").addClass("notification");
        }, 3000);
      }
    })
  }

  duesalesidsearch = " ";
  duefrom = "2022-01-01";
  dueto = currentdate;
  $(".duefrom").val(duefrom);
  $(".dueto").val(dueto);
  duesalesid();
  $(document).on("keyup",".duesalesidsearch",function(){
    duesalesidsearch = $(".duesalesidsearch").val();
    duesalesid();
  })
  $(document).on("change",".duefrom",function(){
    duefrom = $(".duefrom").val();
    duesalesid();
  })
  $(document).on("change",".dueto",function(){
    dueto = $(".dueto").val();
    duesalesid();
  })
  function duesalesid(){
    $.ajax({
      url:"duesales.php",
      method:"POST",
      async:false,
      data:{duesalesidsearch:duesalesidsearch,duefrom:duefrom,dueto:dueto},
      success:function(data){
        $(".duesalesidlist").html(data);
      }
    })
  }

  $(document).on("click","#updatedue",function(){
    updateid = $(this).data("id");
    $.ajax({
      url:"updatedue.php",
      method:"POST",
      async:false,
      data:{updateid:updateid},
      success:function(data){
        console.log(data);
        cashsalesid();
        duesalesid();        
        $(".notititle").text("Data updated successfully.");
        $("#notification").removeClass("notification");
        $("#notification").addClass("notificationon");
        setTimeout(function(){
          $("#notification").removeClass("notificationon");
          $("#notification").addClass("notification");
        }, 3000);
      }
    })
  })

  $(document).on("click",".dueexportbtn",function(){
    dueexport();
  })

  function dueexport(){
    $.ajax({
      url:"dueexport.php",
      method:"POST",
      async:false,
      data:{duesalesidsearch:duesalesidsearch,duefrom:duefrom,dueto:dueto},
      success:function(data){
        $(".downloadcontainer").css("display","flex");
        $(".fileuploadbtn").css("display","none");
        $(".notititle").text("Data exported successfully.");
        $("#notification").removeClass("notification");
        $("#notification").addClass("notificationon");
        setTimeout(function(){
          $("#notification").removeClass("notificationon");
          $("#notification").addClass("notification");
        }, 3000);
      }
    })
  }

  $(document).on("click",".downloadclose",function(){
    $(".downloadcontainer").css("display","none");
    $(".fileuploadbtn").css("display","inline-block");
  })

  $(document).on("click",".downloadbtn",function(){
    $(".downloadcontainer").css("display","none");
    $(".fileuploadbtn").css("display","inline-block");
  })

  $(document).on("click","#delete",function(){
    id = $(this).data("id");
    deleteid(id);
    $(".notititle").text("Data deleted successfully.");
    $("#notification").removeClass("notification");
    $("#notification").addClass("notificationon");
    setTimeout(function(){
      $("#notification").removeClass("notificationon");
      $("#notification").addClass("notification");
    }, 3000);
  })

  function deleteid(id){
    $.ajax({
      url:"delete.php",
      method:"POST",
      async:false,
      data:{id:id},
      success:function(data){
        availableid()
        cashsalesid()
        duesalesid()
      }
    })
  }

  $(document).on("click",".fileuploadbtn",function(){
    $(".fileuploadcontainer").css("display","flex");
    $(".fileuploadbtn").css("display","none");
  })

  $(document).on("change","#file",function(){
    filepreview(this);
  })
  function filepreview(input){
    if (input.files) {
      $(".selectfile").text(""+input.files[0].name+"");
    }else{
      console.log("no file added");
    }
  }

  $(document).on("click",".fileuploadformclose",function(){
    fileuploadformclose();
  })
  function fileuploadformclose(){
    $(".fileuploadcontainer").css("display","none");
    $(".fileuploadbtn").css("display","inline-block");
    document.getElementById('file').value = '';
    $(".selectfile").text("Select file");
  }

  $(document).on("click",".uploadbtn",function(){
    fileupload();
  })
  function fileupload(){
    file = document.getElementById('file');
    totalfile = file.files.length;
    if (totalfile == 0) {
      alert("select some file first");
    }else{
      formdata = new FormData();
      formdata.append('file',file.files[0]);
      $.ajax({
        url:"fileupload.php",
        method:"POST",
        data:formdata,
        contentType: false,
        processData: false,
        async:false,
        success:function(data){
          fileuploadformclose();
          availableid();
          cashsalesid();
          duesalesid();
          $(".notititle").text("Data uploaded successfully.");
          $("#notification").removeClass("notification");
          $("#notification").addClass("notificationon");
          setTimeout(function(){
            $("#notification").removeClass("notificationon");
            $("#notification").addClass("notification");
          }, 3000);
        }
      })
    }
  }

  //login settings
  $(document).on("click",".loginbtn",function () {
    loginval = $("#pass").val();
    $.ajax({
      url:"loggingsettings.php",
      type:"POST",
      data:{loginval:loginval},
      success:function (data){
        console.log(data);
        location.reload();
      }
    })
  })

  //logout settings

  $(document).on("click",".logoutbtn",function(){
    logout = "logout";
    $.ajax({
      url:"index.php",
      type:"POST",
      data:{logout:logout},
      success:function (data) {
        console.log(data);
        location.reload();
      }
    })
  })

})
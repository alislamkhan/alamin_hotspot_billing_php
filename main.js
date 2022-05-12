$(window).ready(function (){

  date = new Date();
  day = date.getDate();
  month = date.getMonth()+1;
  if (month < 10) {
    month = "0" + month;
  }
  year = date.getFullYear();
  currentdate = year+"-"+month+"-"+day;

  $.ajax({
    url:"config/config.php",
    method:"POST",
    async:false,
    success:function(data){
      console.log("function cleared.");
    }
  })
  $(document).keydown(function(event) {
    if (event.which === 13){
      if ($(".inputname").val() == "") {
        alert("Please provide a name first.");
      }else if($(".inputmobile").val().length != 11){
        alert("Please provide a valid number.");
      }else if($(".inputamount").val() == ""){
        alert("Please provide an amount first.");
      }else{
        if ($(".inputpaid").is(":checked")) {
          popupid = -1;
        }else{
          popupid = 01;
        }
        sendsms();
        sendit();
      }
      event.preventDefault();
    }
  });

  $(document).on("click",".sendbtn",function(){
    if ($(".inputname").val() == "") {
      alert("Please provide a name first.");
    }else if($(".inputmobile").val().length != 11){
      alert("Please provide a valid number.");
    }else if($(".inputamount").val() == ""){
      alert("Please provide an amount first.");
    }else{
      if ($(".inputpaid").is(":checked")) {
        popupid = -1;
      }else{
        popupid = 01;
      }
      sendsms();
      sendit();
    }
  })
  function sendit(){
    customerquantity = $(".inputquantity").val();
    customername = $(".inputname").val();
    customerzone = $(".inputzone").val();
    customermobile = $(".inputmobile").val();
    customeramount = $(".inputamount").val();
    if ($(".inputpaid").is(":checked")) {
      paidstatus = "cash";
    }else{
      paidstatus = "due";
    }

    if (customerquantity == 1) {
      $.ajax({
        url:"sendit.php",
        method:"POST",
        async:false,
        data:{customername:customername,customermobile:customermobile,customerzone:customerzone,customeramount:customeramount,paidstatus:paidstatus},
        success:function(data){
          console.log(data);
          availableid();
          cashsalesid();
          duesalesid();
          document.getElementById('name').value = '';
          document.getElementById('mobile').value = '';
          document.getElementById('zone').value = '';
          document.getElementById('amount').value = '';
          $("#paid").prop("checked", false);
          $("#sms").prop("checked", true);
          $(".notititle").text("Id sent successfully");
          $("#notification").removeClass("notification");
          $("#notification").addClass("notificationon");
          setTimeout(function(){
            $("#notification").removeClass("notificationon");
            $("#notification").addClass("notification");
          }, 3000);
        }
      })
      popup();

    }else if(customerquantity > 1){

      for (let i = 0; i < customerquantity; i++) {
        setTimeout(function(){
        $.ajax({
          url:"sendit.php",
          method:"POST",
          async:false,
          data:{customername:customername,customermobile:customermobile,customerzone:customerzone,customeramount:customeramount,paidstatus:paidstatus},
          success:function(data){
            console.log(data);
            availableid();
            cashsalesid();
            duesalesid();
          }
        })
        },i*1000);
      }
      $(".submitformdisable").css("display","block");
      setTimeout(function(){
        document.getElementById('name').value = '';
        document.getElementById('mobile').value = '';
        document.getElementById('zone').value = '';
        document.getElementById('amount').value = '';
        document.getElementById('quantity').value = '1';
        $("#paid").prop("checked", false);
        $("#sms").prop("checked", true);
        $(".notititle").text("All Id sent successfully");
        $("#notification").removeClass("notification");
        $("#notification").addClass("notificationon");
        setTimeout(function(){
          $("#notification").removeClass("notificationon");
          $("#notification").addClass("notification");
        }, 3000);
        $(".submitformdisable").css("display","none");
      },customerquantity*1000-900);

    }else{
      alert("error");
    }
  }

  function sendsms(){
    customername = $(".inputname").val();
    customermobile = $(".inputmobile").val();
    customerzone = $(".inputzone").val();
    customeramount = $(".inputamount").val();
    
    if ($(".inputpaid").is(":checked")) {
      paidstatus = "cash";
    }else{
      paidstatus = "due";
    }

    if ($(".inputsms").is(":checked")) {
      customerquantity = $(".inputquantity").val();
      lenth = customermobile.length;
      if (lenth < 11) {
        console.log("number is less than 11 digit");
      }else{
        $.ajax({
          url:"sendsms.php",
          method:"POST",
          async:false,
          data:{customername:customername,customermobile:customermobile,customerzone:customerzone,customeramount:customeramount,paidstatus:paidstatus,customerquantity:customerquantity},
          success:function(data){
            console.log(data);
          }
        })
      }
    }else{
      console.log("sms sending isn't checked.");
    }
  }

  function popup(){
    $.ajax({
      url:"popup.php",
      method:"POST",
      data:{popupid:popupid},
      async:false,
      success:function(data){
        $(".popupcontainer").html(data);
        $(".popupcontainer").css("display","flex");
      }
    })
  }

  $(document).on("click",".popupclose",function(){
    $(".popupcontainer").css("display","none");
  })

  $(document).on("dblclick",".cashsalesidcol",function(){
    popupid = $(this).data("popupid");
    popup();
  })
  $(document).on("dblclick",".duesalesidcol",function(){
    popupid = $(this).data("popupid");
    popup();
  })

  $(document).on("click",".popupnamecopy",function(){
    copytext = $('#popupname').text();
    navigator.clipboard.writeText(copytext);
    $(".notititle").text("Name copied successfully.");
    $("#notification").removeClass("notification");
    $("#notification").addClass("notificationon");
    setTimeout(function(){
      $("#notification").removeClass("notificationon");
      $("#notification").addClass("notification");
    }, 3000);
  })
  $(document).on("click",".popupmobilecopy",function(){
    copytext = $('#popupmobile').text();
    navigator.clipboard.writeText(copytext);
    $(".notititle").text("Mobile copied successfully.");
    $("#notification").removeClass("notification");
    $("#notification").addClass("notificationon");
    setTimeout(function(){
      $("#notification").removeClass("notificationon");
      $("#notification").addClass("notification");
    }, 3000);
  })
  $(document).on("click",".popupzonecopy",function(){
    copytext = $('#popupzone').text();
    navigator.clipboard.writeText(copytext);
    $(".notititle").text("Zone copied successfully.");
    $("#notification").removeClass("notification");
    $("#notification").addClass("notificationon");
    setTimeout(function(){
      $("#notification").removeClass("notificationon");
      $("#notification").addClass("notification");
    }, 3000);
  })
  $(document).on("click",".popupusernamecopy",function(){
    copytext = $('#popupusername').text();
    navigator.clipboard.writeText(copytext);
    $(".notititle").text("Username copied successfully.");
    $("#notification").removeClass("notification");
    $("#notification").addClass("notificationon");
    setTimeout(function(){
      $("#notification").removeClass("notificationon");
      $("#notification").addClass("notification");
    }, 3000);
  })
  $(document).on("click",".popuppasswordcopy",function(){
    copytext = $('#popuppassword').text();
    navigator.clipboard.writeText(copytext);
    $(".notititle").text("Password copied successfully.");
    $("#notification").removeClass("notification");
    $("#notification").addClass("notificationon");
    setTimeout(function(){
      $("#notification").removeClass("notificationon");
      $("#notification").addClass("notification");
    }, 3000);
  })

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
        console.log("cash sales id fetched.");
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
  })

  $(document).on("click",".downloadbtn",function(){
    $(".downloadcontainer").css("display","none");
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
  dropdown = false;
  $(document).on("click",".rightnav",function(){
    if (dropdown == false) {
      $(".dropdown").css("display","grid");
      $(".rightnav").css("color","#422a64");
      $(".rightnav").css("background","white");
       dropdown = true;
    }else{
      $(".dropdown").css("display","none");
      $(".rightnav").css("color","white");
      $(".rightnav").css("background","#422a64");
       dropdown = false;
    }
  })

  //password change

  $(document).on("click",".passwordchange",function(){
    $(".passwordchangecontainer").css("display","flex");
  })

  $(document).on("click",".passwordchangebtn",function(){
    newpass = $(".passwordchangefield").val();
    $.ajax({
      url:"index.php",
      method:"POST",
      data:{newpass:newpass},
      success:function(data){
        console.log("password changed successfully.");
        $(".passwordchangecontainer").css("display","none");
        document.getElementById('passwordchange').value = '';
        $(".notititle").text("Password changed.");
        $("#notification").removeClass("notification");
        $("#notification").addClass("notificationon");
        setTimeout(function(){
          $("#notification").removeClass("notificationon");
          $("#notification").addClass("notification");
        }, 3000);
      }
    })
  })

  $(document).on("click",".passwordchangeclose",function(){
    $(".passwordchangecontainer").css("display","none");
    document.getElementById('passwordchange').value = '';
  })

  $(document).on("click",".uploaddata",function(){
    $(".fileuploadcontainer").css("display","flex");
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

  // database backup

  $(document).on("click",".backupdatabase",function (){
    $.ajax({
      url:"dbbackup.php",
      type:"POST",
      success:function (data){
        console.log(data);
        $(".dbdownloadcontainer").css("display","flex");
      }
    })
  })

  $(document).on("click",".dbdownloadclose",function(){
    $(".dbdownloadcontainer").css("display","none");
  })

  $(document).on("click",".dbdownloadbtn",function(){
    $(".dbdownloadcontainer").css("display","none");
  })

  //logout settings

  $(document).on("click",".logout",function(){
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
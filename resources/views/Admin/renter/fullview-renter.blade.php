

    <html>
    <head>



    <style type="text/css">
.mydiv{

text-align: left;
    padding: 5px;
    border-bottom: 1px dashed darkslategray;    
    font-size: 13px;
}
</style>


<style type="text/css">
        @media print {


#top{
display: block;
}



  #printPageButton {
    size: 7in 9.25in;
   margin: 27mm 16mm 27mm 16mm;
    display: none;
  }
}
    </style>



</head>
<body>
    
    @if(Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 2rem">
            <i class="fas fa-check fa-2x"></i>&nbsp;&nbsp;&nbsp;
                <strong>{{Session::get('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding-top: 2rem">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        


            @foreach($renters as $renter)

  <div id="top">
      <div style="width: 60%;
    margin-left: 18%;
    margin-top: 10%;
    align-self: center;
    display: inline;
    float: left;
    padding: 20px;
   /* margin-left: 425px;*/
    border: 1px dashed black;">


    <div style="text-align:center;">
        <h1>ভাড়াটিয়া নিবন্ধন ফরম</h1>
        </div>

        <div class="mydiv"><img src="http://103.106.237.132/rentsoft/{{($renter->r_image)}}" alt="no image" width="100px" ></div>
        <div class="mydiv">১. ভাড়াটিয়ার নামঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->r_name}}</b></div>
        <div class="mydiv">২. পিতার নামঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->father}}</b></div>
        <div class="mydiv">৩. জন্ম তারিখঃ <b>&nbsp;&nbsp;&nbsp;{{ date('j F, Y', strtotime($renter->birthday)) }}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>বৈবাহিক অবস্থাঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->marital_status}}</b></span></div>
        <div class="mydiv">৪. স্থায়ী ঠিকানাঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->per_address}}</b></div>
        <div class="mydiv">৫. পেশাঃ  <b>&nbsp;&nbsp;&nbsp;{{$renter->occupation}}</b></div>
        <div class="mydiv">৬. প্রতিষ্ঠানের নামঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->company}}</b></div>
        <div class="mydiv">৭. ধর্মঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->religion}}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>শিক্ষাগত যোগ্যতাঃ  <b>&nbsp;&nbsp;&nbsp;{{$renter->qualification}}</b></span></div>
        <div class="mydiv">৮. মোবাইলঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->r_phone}}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>ইমেইল আইডিঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->r_email}}</b></span></div>
        <div class="mydiv">৯. জাতীয় পরিচয়পত্র নম্বরঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->r_nid}}</b></div>
        <div class="mydiv">১০. পাসপোর্ট নম্বরঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->p}}</b></div>
       <br>
        <div class="mydiv">১১. <b>জরুরি যোগাযোগঃ</b></div> 
        <div class="mydiv">(ক) নামঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->e_full_name}}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>(খ) সম্পর্কঃ  <b>&nbsp;&nbsp;&nbsp;{{$renter->e_rel}}</b></span></div>
        <div class="mydiv">(গ) ঠিকানাঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->e_add}}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>(ঘ) মোবাইলঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->e_phone}}</b></span></div>
    <br>
       <div class="mydiv">১২. <b>পরিবার/মেসের সঙ্গীয় সদস্যদের বিবরণঃ</b></div>
        <div class="mydiv">
            <table border="1" width="100%" >
                <thead>
                    <tr>
                        <td>নং.</td>
                        <td width="40%" align="center">নাম</td>
                        <td align="center">বয়স</td>
                        <td align="center">পেশা</td>
                        <td align="center">মোবাইল নম্বর</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>১।</td>
                        <td align="center">{{$renter->member_name_one}}</td>
                        <td align="center">{{$renter->member_age_one}}</td>
                        <td align="center">{{$renter->member_occupation_one}}</td>
                        <td align="center">{{$renter->member_phone_one}}</td>
                    </tr>


                   <tr>
                        <td>২।</td>
                        <td align="center">{{$renter->member_name_two}}</td>
                        <td align="center">{{$renter->member_age_two}}</td>
                        <td align="center">{{$renter->member_occupation_two}}</td>
                        <td align="center">{{$renter->member_phone_two}}</td>
                    </tr>

                    <tr>
                        <td>৩।</td>
                        <td align="center">{{$renter->member_name_three}}</td>
                        <td align="center">{{$renter->member_age_three}}</td>
                        <td align="center">{{$renter->member_occupation_three}}</td>
                        <td align="center">{{$renter->member_phone_three}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
<br>
     
     <div class="mydiv">১৩. <b>গৃহকর্মীর তথ্যাবলিঃ</b></div> 
        <div class="mydiv">(ক) নামঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->maid_name}}</b></div>
        <div class="mydiv">(খ) জাতীয় পরিচয়পত্র নম্বরঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->maid_nid}}</b></div>
        <div class="mydiv">(গ) মোবাইলঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->maid_phone}}</b></div>
        <div class="mydiv">(ঘ) স্থায়ী ঠিকানাঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->maid_address}}</b></div>
            
    <br>

    
    <div class="mydiv">১৪. <b>ড্রাইভারের তথ্যাবলিঃ</b></div> 
        <div class="mydiv">(ক) নামঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->driver_name}}</b></div>
        <div class="mydiv">(খ) জাতীয় পরিচয়পত্র নম্বরঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->driver_nid}}</b></div>
        <div class="mydiv">(গ) মোবাইলঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->driver_phone}}</b></div>
        <div class="mydiv">(ঘ) স্থায়ী ঠিকানাঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->driver_address}}</b></div>

 
 <br>
    
    <div class="mydiv">১৫. <b>পূর্ববর্তী বাড়িওয়ালার তথ্যাবলিঃ</b></div> 
        <div class="mydiv">(ক) পূর্ববর্তী বাড়িওয়ালার নামঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->pre_owner_name}}</b></div>
        <div class="mydiv">(গ) মোবাইলঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->pre_owner_phone}}</b></div>
        <div class="mydiv">(ঘ) ঠিকানাঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->pre_owner_address}}</b></div>
<br>

<div class="mydiv">১৬. <b>পূর্ববর্তী বাসা ছাড়ার কারণঃ</b></div>
      <div class="mydiv">{{$renter->reason}}</div>
<br>
<div class="mydiv">১৭. <b>বর্তমান বাড়িওয়ালার তথ্যাবলিঃ</b></div> 
        <div class="mydiv">(ক) বর্তমান বাড়িওয়ালার নামঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->new_owner_name}}</b></div>
        <div class="mydiv">(গ) মোবাইলঃ <b>&nbsp;&nbsp;&nbsp;{{$renter->new_owner_phone}}</b></div>
        
<br>
 <div class="mydiv">১৮. <b>বর্তমান বাড়িতে কোন তারিখ থেকে বসবাসঃ</b></div> 
        <div class="mydiv"><b>&nbsp;&nbsp;&nbsp;{{ date('j F, Y', strtotime($renter->new_house_start_date)) }}</b></div>
        
<br>
    <div style="text-align:center;padding-top: 10px;">মাসের ১০ তারিখের মধ্যে ভাড়া পরিশোধ করবেন</div>
    <div style="margin-top:80px;">
    <span style="text-align:left; border-top: 1px dashed black; padding-top: 10px;">মালিকের স্বাক্ষর</span>    
    <span style="float:right; border-top: 1px dashed black; padding-top: 10px;">ভাড়াটিয়ার স্বাক্ষর</span></div>
    <br>
    <br>
    <input type="button" id="printPageButton" value="Print" align="right" onclick="printPage();"></input>

</div>
    
 @endforeach
  </div>          
    

<script language="javascript">
    function printPage() {
        window.print();
    }
</script>

</body>
</html>


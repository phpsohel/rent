

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
        
            @foreach($re as $r)
    <div style="width: 400px;
    display: inline;
    float: left;
    padding: 20px;
    border: 1px dashed black;">


    <div style="text-align:center;">
        <h1>ভাড়ার রশিদ<br><span style="font-size:12px;">(উচ্ছেদ যোগ্য)</span></h1>
        </div>

        <div class="mydiv">মাস: <b style="margin-left: 67%">{{$r->mt_date}}</b></div>
        <div class="mydiv">বাড়ির নাম: <b style="margin-left: 50%">{{$r->m_house}}</b></div>
        <div class="mydiv">ফ্ল্যাট নম্বর: <b style="margin-left: 60%">{{$r->flat_number}}</b></div>
        <div class="mydiv">ভাড়াটিয়ার নাম: <b style="margin-left: 50%">{{$r->renter_name}}</b></div>
        <div class="mydiv">ফ্ল্যাট ভাড়া: <b style="margin-left: 60%">{{$r->mt_rent}}</b></div>
        <div class="mydiv">বিদ্যুৎ বিল: <b style="margin-left: 61%">{{$r->mt_current}}/= (<i>per unit</i>)</b></div>
        <div class="mydiv">গ্যাস বিল: <b style="margin-left: 62%">{{$r->mt_gas}}/=</b></div>
        <div class="mydiv">পানির বিল: <b style="margin-left: 60%">{{$r->mt_water}}/=</b></div>
        <div class="mydiv">পরিচ্ছনতা বিল: <b style="margin-left: 54%">{{$r->mt_sewer}}/=</b></div>
        <div class="mydiv">রক্ষণাবেক্ষণ খরচ: <b style="margin-left: 51%">{{$r->mt_maintain}}/=</b></div>
        <div class="mydiv">অন্যান্য: <b style="margin-left: 64%">{{$r->mt_others_cost}}/=</b></div>
        <div class="mydiv"><b>মোট ভাড়া: <span style="font-size: 17px;
    padding-left: 10px; margin-left: 56%">{{$r->total_money}}/=</span></b></div>
   

    <div style="text-align:center;padding-top: 10px;">মাসের ১০ তারিখের মধ্যে ভাড়া পরিশোধ করবেন</div>
    <div style="margin-top:80px;">
    <span style="text-align:left; border-top: 1px dashed black; padding-top: 10px;">মালিকের স্বাক্ষর</span>    
    <span style="float:right; border-top: 1px dashed black; padding-top: 10px;">ভাড়াটিয়ার স্বাক্ষর</span></div>
    </div>
 @endforeach

</body>
</html>


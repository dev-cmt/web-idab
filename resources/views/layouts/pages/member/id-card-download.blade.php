<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ID Card</title>

<style>
@page {
    size: A4;
    margin: 10mm;
}

body{
    font-family: Arial, sans-serif;
}

.page{
    display:flex;
    justify-content:center;
}

.id-card{
    width:54mm;
    height:86mm;
    background:#f1f1f1;
    border-radius:10px;
    overflow:hidden;
    border:1px solid #ccc;
}

/* Header #e70d2b*/
.header{
    background:#808080;
    height:60px;
    text-align:center;
    color:#fff;
    padding-top:10px;
}

.header h4{
    font-size:10pt;
    margin:0;
    letter-spacing:1px;
}

/* Photo */
.photo-box{
    text-align:center;
    margin-top:-35px;
}

.photo-box img{
    width:75px;
    height:75px;
    border-radius:50%;
    border:4px solid #fff;
    object-fit:cover;
}

/* Content */
.content{
    padding:9px 8px;
    text-align:center;
}

.name{
    font-size:11pt;
    font-weight:bold;
    color:#b71c1c;
    margin:4px 0;
    height: 36px;
    align-content: center;
}

.role{
    font-size:8pt;
    color:#555;
    margin-bottom:8px;
}

/* Table */
.info{
    width:100%;
    font-size:7pt;
    padding:0px 12px;
}

.info td{
    padding:2px 0;
    text-align:left;
    padding-left: 10px;
}

.label{
    color:#919191;
    font-weight:bold;
    text-align:left;
}

.value{
    font-weight:600;
}

/* QR */
.qr{
    margin-top:8px;
}

.qr img{
    width:35px;
    border:1px solid #d32f2f;
    padding:2px;
}

/* Footer */
.footer{
    text-align:center;
    font-size:6pt;
    color:#666;
    margin-top:5px;
}

.bottom-bar{
    height:5px;
    background:gray;
}
</style>
</head>

<body>
     @php
        $image_path = public_path('images/logo.png');
        $image_data = base64_encode(file_get_contents($image_path));
    @endphp
<div class="page">
    

<div class="id-card">

    <div class="header">
        <img src="data:image/jpeg;base64,{{ $image_data }}" width="35">
        <!--<h4>{{ config('app.name','OFFICE MEMBER') }}</h4>-->
    </div>

    <div class="photo-box">
        @php
            $imgPath = public_path('images/profile/'.$user->profile_photo_path);
            $defaultImg = "https://ui-avatars.com/api/?name=".urlencode($user->name)."&background=d32f2f&color=fff";
        @endphp

        @if($user->profile_photo_path && file_exists($imgPath))
            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents($imgPath)) }}">
        @else
            <img src="{{ $defaultImg }}">
        @endif
    </div>

    <div class="content">
        <div class="name">{{ $user->name }}</div>
        <div class="role">{{ $user->memberType->name ?? 'Staff Member' }}</div>

        <table class="info">
            <tr>
                <td class="label">ID</td>
                <td><strong>:</strong></td>
                <td class="value">{{ $user->member_code ?? $user->id }}</td>
            </tr>
            <tr>
                <td class="label">STATUS</td>
                <td><strong>:</strong></td>
                <td class="value">{{ $user->status==1?'VERIFIED':'PENDING' }}</td>
            </tr>
            <tr>
                <td class="label">EXPIRES</td>
                <td><strong>:</strong></td>
                <td class="value">
                @php
                $expire = now()->month>6
                ? now()->addYear()->month(6)->endOfMonth()
                : now()->month(6)->endOfMonth();
                @endphp
                {{ $expire->format('d/m/Y') }}
                </td>
            </tr>
        </table>

        <div class="qr">
            @php
            $url = route('member-verify',$user->id);
            $qr = base64_encode(
            QrCode::format('png')->size(120)->margin(0)->generate($url)
            );
            @endphp
            <img src="data:image/png;base64,{{ $qr }}">
        </div>

        <div class="footer">
            Scan to Verify
        </div>
    </div>

    <div class="bottom-bar"></div>

</div>
</div>
</body>
</html>

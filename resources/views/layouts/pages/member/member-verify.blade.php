<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .verification-card {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #007bff;
            margin: 0 auto 20px;
            display: block;
        }
        .verified-badge {
            background: #28a745;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 20px;
        }
        .invalid-badge {
            background: #ff0000;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 20px;
        }
        .info-row {
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }
        .info-label {
            font-weight: bold;
            color: #495057;
        }
        .info-value {
            color: #6c757d;
        }
        .qr-code {
            width: 150px;
            height: 150px;
            margin: 20px auto;
            display: block;
        }
    </style>
</head>
<body>
    <div class="verification-card">
        <div class="text-center mb-4">
            <h1 class="mb-3">Member Verification</h1>
            @if($user->status == 1)
            <div class="verified-badge">
                <i class="fas fa-check-circle"></i> Verified Member
            </div>
            @else
            <div class="invalid-badge">
                <i class="fas fa-check-circle"></i> Invalid Member
            </div>
            @endif
        </div>

        @if($user->profile_photo_path)
        <img src="{{ asset('public/images/profile/' . $user->profile_photo_path) }}" 
             alt="Profile Photo" 
             class="profile-img"
             onerror="this.src='https://via.placeholder.com/150'">
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="info-row">
                    <div class="info-label">Member Name:</div>
                    <div class="info-value">{{ $user->name }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-row">
                    <div class="info-label">Member ID:</div>
                    <div class="info-value">{{ $user->member_code ?? 'N/A' }}</div>
                </div>
            </div>
        </div>

        <div class="row">
            
            <div class="col-md-6">
                <div class="info-row">
                    <div class="info-label">Member Since:</div>
                    <div class="info-value">{{ date('F j, Y', strtotime($user->created_at)) }}</div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="info-row">
                    <div class="info-label">Member Type:</div>
                    <div class="info-value">{{ $user->memberType->name ?? 'Member' }}</div>
                </div>
            </div>
        </div>

        @if($user->infoPersonal)
        <div class="row">
            @if($user->infoAcademic)
            <div class="col-md-6">
                <div class="info-label">Qualification:</div>
                <div class="info-value">
                    {{ $user->infoAcademic->mastQualification->name ?? 'N/A' }}
                    @if($user->infoAcademic->institute)
                    ({{ $user->infoAcademic->institute }})
                    @endif
                </div>
            </div>
            @endif
            <div class="col-md-6">
                <div class="info-label">Expire Date:</div>
                <div class="info-value">
                {{ now()->month > 6 
                    ? now()->addYear()->month(6)->endOfMonth()->format('d F Y') 
                    : now()->month(6)->endOfMonth()->format('d F Y') 
                }}
                </div>
            </div>

        </div>
        @endif

        <!-- QR Code for verification -->
        <div class="text-center mt-4">
            <h5>Scan to Verify</h5>
            @php
                $verificationUrl = route('member-verify', $user->id);
            @endphp
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($verificationUrl) }}" alt="QR Code" class="qr-code">
        </div>

        <div class="text-center mt-4">
            <p class="text-muted">
                Verified on {{ date('F j, Y') }}
                <!-- | Certificate No: CERT-{{ str_pad($user->id, 6, '0', STR_PAD_LEFT) }}-->
            </p>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
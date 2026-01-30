<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- html2canvas -->
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
</head>

<body class="bg-gray-200 min-h-screen flex flex-col items-center justify-center gap-6">
   
  

    <!-- Certificate Container -->
    <div id="certificate"
         class="bg-white w-[900px] h-[650px] border-8 border-indigo-900 p-10 shadow-2xl relative">

        <!-- Top Decoration -->
        <div class="absolute top-0 left-0 w-full h-2 bg-indigo-900"></div>

        <!-- Header -->
        <div class="text-center mt-6">
            <h1 class="text-4xl font-extrabold text-indigo-900 tracking-wide">
                Certificate of Achievement
            </h1>

            <!-- Badge -->
            <div class="flex justify-center mt-4">
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 -960 960 960"
                     class="w-16 h-16 fill-indigo-700">
                    <path d="m363-310 117-71 117 71-31-133 104-90-137-11-53-126-53 126-137 11 104 90-31 133ZM480-28 346-160H160v-186L28-480l132-134v-186h186l134-132 134 132h186v186l132 134-132 134v186H614L480-28Zm0-112 100-100h140v-140l100-100-100-100v-140H580L480-820 380-720H240v140L140-480l100 100v140h140l100 100Zm0-340Z"/>
                </svg>
            </div>

            <p class="mt-3 text-gray-600 italic">
                This certificate is proudly presented to
            </p>
        </div>

        <!-- Recipient Name -->
        <div class="text-center mt-10">
            <h2 class="text-5xl font-bold text-gray-800 underline decoration-indigo-600">
                John Doe
            </h2>
        </div>

        <!-- Description -->
        <div class="text-center mt-10 px-16">
            <p class="text-lg text-gray-700 leading-relaxed">
                For successfully completing the <span class="font-semibold">Laravel Quiz System</span>
                with outstanding performance and demonstrating excellent knowledge and skills.
            </p>
        </div>

        <!-- Date & Signature -->
        <div class="flex justify-between items-center mt-20 px-16">
            <div class="text-center">
                <p class="text-gray-600">Date</p>
                <p class="font-semibold text-gray-800 border-t-2 border-gray-400 mt-2 pt-1 w-40">
                    {{ date('d M Y') }}
                </p>
            </div>

            <div class="text-center">
                <p class="text-gray-600">Authorized Signature</p>
                <div class="border-t-2 border-gray-400 mt-2 pt-1 w-48 font-semibold text-gray-800">
                    Quiz System
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="absolute bottom-6 w-full text-center">
            <p class="text-sm text-gray-500">
                Certificate ID: #CERT-2026-001
            </p>
        </div>
    </div>

    <!-- Script -->
    <script>
        function downloadCertificate() {
            const certificate = document.getElementById('certificate');

            html2canvas(certificate, { scale: 2 }).then(canvas => {
                const link = document.createElement('a');
                link.download = 'certificate.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
            });
        }
    </script>

</body>
</html>
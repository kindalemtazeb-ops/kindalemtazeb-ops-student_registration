<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kindalem Tazeb | Portfolio</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-[#FDFDFC] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col font-sans">
        
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
            <nav class="flex items-center justify-end gap-4">
                <a href="#" class="hover:underline">Home</a>
                <a href="#" class="hover:underline">About</a>
                <a href="#" class="hover:underline">Skills</a>
                <a href="#" class="hover:underline">Contact</a>
            </nav>
        </header>

        <main class="flex max-w-[335px] w-full flex-col lg:max-w-4xl">
            <div class="p-8 lg:p-12 bg-white shadow-sm border border-[#e3e3e0] rounded-xl">
                
                <div class="mb-10">
                    <h1 class="text-3xl font-bold mb-2">Welcome to My Portfolio</h1>
                    <p class="text-[#706f6c]">I am a Full-Stack Developer. Explore my projects below.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <div class="p-6 border border-[#e3e3e0] rounded-xl hover:shadow-md transition-all">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="p-3 bg-teal-100 rounded-lg text-teal-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                            </div>
                            <h3 class="font-bold text-xl">Student Registration</h3>
                        </div>
                        <p class="text-sm text-[#706f6c] mb-6">Manage student records and admissions.</p>
                        <a href="http://127.0.0.1:8000/students" target="_blank" class="block w-full text-center py-3 bg-teal-600 hover:bg-teal-700 text-white rounded-lg font-bold transition">
                            Run Student System
                        </a>
                    </div>

                    <div class="p-6 border border-[#e3e3e0] rounded-xl hover:shadow-md transition-all">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="p-3 bg-indigo-100 rounded-lg text-indigo-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/></svg>
                            </div>
                            <h3 class="font-bold text-xl">Banking Management</h3>
                        </div>
                        <p class="text-sm text-[#706f6c] mb-6">Secure platform for account transactions.</p>
                        <a href="http://127.0.0.1:8001/bank" target="_blank" class="block w-full text-center py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-bold transition">
                            Run Banking System
                        </a>
                    </div>

                </div>
            </div>
        </main>
    </body>
</html>
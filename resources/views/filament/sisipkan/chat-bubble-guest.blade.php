{{-- guest --}}

@auth
<!-- Bubble Chat untuk pengguna yang sudah login -->
<div id="chat-bubble" onclick="toggleChat()" class="fixed bottom-5 animate-bounce right-5 bg-blue-500 text-white rounded-full cursor-pointer shadow-lg z-[9999] flex items-center justify-center">
    <div class="size-20 flex items-center justify-center bg-blue-600 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
        </svg>
    </div>
</div>

<div id="chat-box" class="fixed bottom-20 right-5 w-[350px] h-[500px] bg-white shadow-lg rounded-lg hidden z-[9999]">
    <iframe id="chat-iframe" src="{{ Auth::user()->name === 'Admin User' ? url('chatify') : url('chatify/1') }}" class="w-full h-full border-none"></iframe>
</div>

<script>
    function toggleChat() {
        var chatBox = document.getElementById("chat-box");
        chatBox.style.display = (chatBox.style.display === "none" || chatBox.style.display === "") ? "block" : "none";
    }

    function openChatRoom(roomId) {
        document.getElementById("chat-box").style.display = "block";
        document.getElementById("chat-iframe").src = '/chatify/' + roomId;
    }

</script>
@else
<!-- Bubble Chat untuk tamu (belum login) akan mengarahkan ke halaman login -->
<div id="chat-bubble" onclick="window.location.href='{{ url('/admin/login') }}'" class="fixed bottom-5 animate-bounce right-5 bg-blue-500 text-white rounded-full cursor-pointer shadow-lg z-[9999] flex items-center justify-center">
    <div class="size-20 flex items-center justify-center bg-blue-600 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
        </svg>
    </div>
</div>

@endauth

<script>
    function toggleChat() {
        var chatBox = document.getElementById("chat-box");
        chatBox.style.display = (chatBox.style.display === "none" || chatBox.style.display === "") ? "block" : "none";
    }
    function openChatRoom(roomId) {
        // Pastikan chat box ditampilkan
        document.getElementById("chat-box").style.display = "block";
        // Ubah URL src pada iframe untuk membuka room yang diinginkan
        document.getElementById("chat-iframe").src = '/chatify/' + roomId;
    }
</script>
{{-- guest --}}

@auth
<!-- Bubble Chat untuk pengguna yang sudah login -->
<div id="chat-bubble" onclick="toggleChat()" style="position: fixed; bottom: 20px; right: 20px; background-color: #007bff; color: white; padding: 15px; border-radius: 50%; cursor: pointer; box-shadow: 0 4px 6px rgba(0,0,0,0.1); z-index: 9999;">
    <div class="avatar size-12">
        <div class="is-initial rounded-full bg-info text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
            </svg>
        </div>
    </div>
</div>

<div id="chat-box" style="position: fixed; bottom: 80px; right: 20px; width: 350px; height: 500px; background-color: white; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 10px; display: none; z-index: 9999;">
    <iframe id="chat-iframe" src="{{ Auth::user()->name === 'Admin User' ? url('chatify') : url('chatify/1') }}" style="width: 100%; height: 100%; border: none;">
    </iframe>
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
<div id="chat-bubble" onclick="window.location.href='{{ url('/admin/login') }}'" style="position: fixed; bottom: 20px; right: 20px; background-color: #007bff; color: white; padding: 15px; border-radius: 100%; cursor: pointer; box-shadow: 0 4px 6px rgba(0,0,0,0.1); z-index: 9999;">
    <div class="avatar size-12">
        <div class="is-initial rounded-full bg-info text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
            </svg>
        </div>
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
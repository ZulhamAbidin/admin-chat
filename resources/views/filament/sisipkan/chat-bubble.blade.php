@auth
<!-- Bubble Chat untuk pengguna yang sudah login -->
<div id="chat-bubble" onclick="toggleChat()" 
            style="position: fixed; bottom: 20px; right: 20px; 
            background-color: #df7402; color: white; 
            width: 50px; height: 50px; border-radius: 50%; 
            display: flex; align-items: center; justify-content: center; 
            cursor: pointer; box-shadow: 0 4px 6px rgba(0,0,0,0.1); 
            z-index: 9999;">
    <ion-icon name="chatbubble" style="font-size: 24px;"></ion-icon>
</div>
 <!-- Bubble Home untuk navigasi ke halaman welcome -->
<div style="position: fixed; bottom: 20px; right: 80px; 
            background-color: #df7402; color: white; 
            width: 50px; height: 50px; border-radius: 50%; 
            display: flex; align-items: center; justify-content: center; 
            cursor: pointer; box-shadow: 0 4px 6px rgba(0,0,0,0.1); 
            z-index: 9999;">
    <a href="{{ route('welcome') }}" style="color: white; text-decoration: none;">
        <ion-icon name="home" style="font-size: 24px;"></ion-icon>
    </a>
</div>


<div id="chat-box" style="position: fixed; bottom: 80px; right: 20px; width: 350px; height: 500px; background-color: white; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 10px; display: none; z-index: 9999;">
    <iframe id="chat-iframe" src="{{ Auth::user()->name === 'Admin User' ? url('chatify') : url('chatify/1') }}" style="width: 100%; height: 100%; border: none;">
    </iframe>
</div>
<style>
    /* Sembunyikan menu News Letters dan Share Snippets */
    [href*="newsletters"], /* Sesuaikan dengan URL yang muncul di menu */
    [href*="settings"],
    [href*="share-snippets"] {
        display: none !important;
    }
</style>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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
<div id="chat-bubble" onclick="window.location.href='{{ url('/admin/login') }}'" style="position: fixed; bottom: 20px; right: 20px; background-color: #007bff; color: white; padding: 15px; border-radius: 50%; cursor: pointer; box-shadow: 0 4px 6px rgba(0,0,0,0.1); z-index: 9999;">
    💬
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

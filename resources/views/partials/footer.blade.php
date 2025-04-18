<footer id="footer" class="footer py-4 text-center text-dark" style="background: linear-gradient(135deg, #e3f2fd, #ffffff); border-top: 1px solid #cfd8dc;">
  <div class="container">
    <!-- Header dengan logo -->
    <h5 class="fw-bold text-primary mb-2">
      <i class="bi bi-journal-bookmark-fill me-2"></i>PERPUSTAKAAN DIGITAL
    </h5>

    <!-- Deskripsi -->
    <p class="mb-2 fst-italic text-muted">Tempat terbaik untuk membaca dan berbagi pengetahuan 📚</p>

    <!-- Sosial Media Links -->
    <div class="mb-3">
      <a href="#" class="btn btn-outline-primary btn-sm rounded-pill mx-1" style="transition: background-color 0.3s;">
        <i class="bi bi-facebook"></i> <!-- Facebook Icon -->
      </a>
      <a href="#" class="btn btn-outline-info btn-sm rounded-pill mx-1" style="transition: background-color 0.3s;">
        <i class="bi bi-twitter"></i> <!-- Twitter Icon -->
      </a>
      <a href="#" class="btn btn-outline-danger btn-sm rounded-pill mx-1" style="transition: background-color 0.3s;">
        <i class="bi bi-youtube"></i> <!-- YouTube Icon -->
      </a>
      <a href="#" class="btn btn-outline-success btn-sm rounded-pill mx-1" style="transition: background-color 0.3s;">
        <i class="bi bi-whatsapp"></i> <!-- WhatsApp Icon -->
      </a>
    </div>

    <!-- Footer Text -->
    <p class="mb-0 text-secondary small">
      &copy; <span id="year"></span> <strong>PERPUSTAKAAN</strong> — All Rights Reserved.
    </p>
  </div>
</footer>

<!-- Dynamic year script -->
<script>
  document.getElementById('year').textContent = new Date().getFullYear();
</script>

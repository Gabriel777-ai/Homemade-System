<style>
  footer {
    background-color: #555;
    color: #f8f9fa;
    padding: 4rem 1rem 2rem;
    margin-top: 10rem;
  }

  .footer-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    max-width: 1200px;
    margin: auto;
    gap: 2rem;
  }

  .footer-col {
    flex: 1 1 200px;
  }

  .footer-col h6 {
    font-weight: bold;
    margin-bottom: 1rem;
  }

  .footer-col ul {
    list-style: none;
    padding: 0;
  }

  .footer-col ul li {
    margin-bottom: 0.5rem;
  }

  .footer-col ul li a {
    color: #f8f9fa;
    text-decoration: none;
  }

  .footer-col ul li a:hover {
    text-decoration: underline;
  }

  .footer-bottom {
    text-align: center;
    padding-top: 2rem;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    font-size: 0.875rem;
  }
</style>

<footer>
  <div class="footer-container">
    <div class="footer-col">
      <h6>About Us</h6>
      <ul>
        <li><a href="#">Company Overview</a></li>
        <li><a href="#">Our Team</a></li>
        <li><a href="#">Mission & Vision</a></li>
        <li><a href="#">Careers</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h6>Support</h6>
      <ul>
        <li><a href="#">Help Center</a></li>
        <li><a href="#">Contact Support</a></li>
        <li><a href="#">FAQs</a></li>
        <li><a href="#">Live Chat</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h6>Resources</h6>
      <ul>
        <li><a href="<?= $root ?>">Patient Portal</a></li>
        <li><a href="<?= $root ?>">Doctor Login</a></li>
        <li><a href="#">HR System</a></li>
        <li><a href="#">LMS Access</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h6>Legal</h6>
      <ul>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms of Service</a></li>
        <li><a href="#">Cookie Policy</a></li>
        <li><a href="#">Compliance</a></li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom mt-4">
    <sub>&copy; 2025 Bestlink General Hospital. All rights reserved.</sub>
  </div>
</footer>

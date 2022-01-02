<?php wp_footer(); ?>

<style>
.footer p {
  font-family: sans-serif;
  font-weight: 100;
  font-size: 0.8em;
}
.footer {
  width: 100%;
  display: inline-block;
}
.footer ul {
  width: 100vw;
  list-style: none;
}
.footer ul li {
  margin: 2rem;
  float: left;
  width: 25%;
  font-weight: bold;
  text-align: center;
}
@media screen and (max-width: 800px) {

.footer ul li {
  font-size: 0.8rem; 
  margin: 1rem; }
}
@media screen and (max-width: 360px) {

.footer ul li {
  font-size: 0.5rem; 
  margin: 0.2rem; }
}

</style>

<!doctype html>
<body>
   <div class="footer">
      <ul>
      <li>
         <p>Address: <br> Fruebjergvej 3 (SYMBION) <br> 2100 København Ø <br> Denmark </p>
      </li>
      <li>
         <p>Telephone: <br> <a href="tel:+4536981216">+45 36 98 12 16</a> </p>
      </li>
      <li>
         <p>E-mail: <br> <a href="mailto:info@power-roof.com">info@power-roof.com</a> </p>
      </li>
   </div>
</body>
</html>
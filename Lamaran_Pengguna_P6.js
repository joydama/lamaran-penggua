const form = document.getElementById("jobForm");

form.addEventListener("submit", function(e) {

  const email =
    document.getElementById("email").value;

  const hp =
    document.getElementById("hp").value;

  if (!email.includes("@")) {

    e.preventDefault();

    alert("Email tidak valid!");
    return;
  }

  if (isNaN(hp)) {

    e.preventDefault();

    alert("Nomor HP harus angka!");
    return;
  }

});
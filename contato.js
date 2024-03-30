const form = document.querySelector("form");
const contactTableBody = document.querySelector("#contactTableBody");

let contactList = [];

if (localStorage.getItem("contactList")) {
  contactList = JSON.parse(localStorage.getItem("contactList"));
}

function capitalizeFirstLetters(phrase) {
  if (phrase) {
    return phrase
      .toLocaleLowerCase()
      .split(" ")
      .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
      .join(" ");
  }
}

form.addEventListener("submit", (e) => {
  e.preventDefault();

  const name = capitalizeFirstLetters(e.target.elements.nome.value);
  const email = e.target.elements.email.value;

  if (!name || !email) return;

  contactList.push({ name, email });

  localStorage.setItem("contactList", JSON.stringify(contactList));

  contactTableBody.innerHTML = `
  <tr>
  <td class='text-centerr'>
  <div class="spinner-border text-center" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  </td>
  <td class='text-centerr'>
  <div class="spinner-border text-center" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  </td>
  </tr>`;

  setTimeout(() => {
    contactTableBody.innerHTML = "";

    contactList.forEach((contact) => {
      const tr = document.createElement("tr");
      const tdName = document.createElement("td");
      const tdEmail = document.createElement("td");

      tdName.textContent = contact.name;
      tdEmail.textContent = contact.email;

      tr.appendChild(tdName);
      tr.appendChild(tdEmail);

      contactTableBody.appendChild(tr);
    });
  }, 2000);
});

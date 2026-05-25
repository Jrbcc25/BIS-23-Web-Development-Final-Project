document.getElementById("invoiceDate").valueAsDate = new Date();

function calculateTotal() {
  let amounts = document.querySelectorAll(".amount");
  let subtotal = 0;

  amounts.forEach(function(input) {
    subtotal += Number(input.value) || 0;
  });

  let taxRate = Number(document.getElementById("taxRate").value) || 0;
  let otherCosts = Number(document.getElementById("otherCosts").value) || 0;

  let taxAmount = subtotal * (taxRate / 100);
  let total = subtotal + taxAmount + otherCosts;

  document.getElementById("subtotal").value = "$" + subtotal.toFixed(2);
  document.getElementById("totalCost").value = "$" + total.toFixed(2);
}

function addRow() {
  let table = document.getElementById("items");
  let row = document.createElement("tr");

  row.innerHTML = `
    <td><input type="text" placeholder="New Item"></td>
    <td><input type="number" class="amount" value="0"></td>
  `;

  table.appendChild(row);
  row.querySelector(".amount").addEventListener("input", calculateTotal);
}

function clearForm() {
  document.querySelectorAll("input").forEach(function(input) {
    if (input.type === "date") {
      input.valueAsDate = new Date();
    } else if (input.classList.contains("amount") || input.id === "otherCosts") {
      input.value = 0;
    } else if (input.id === "taxRate") {
      input.value = 8.875;
    } else {
      input.value = "";
    }
  });

  calculateTotal();
}

document.addEventListener("input", calculateTotal);
calculateTotal();
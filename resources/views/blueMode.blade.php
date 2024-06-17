<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grocery List</title>
    <link rel="stylesheet" href="{{ asset('css/blueMode.css') }}" />
  </head>
  <body>
    
    <div class="header">
      <div class="logo">
      <a href="{{ route('home') }}">
        <img src="image/logo.png" alt="Logo" />
      </a>
        sho-cart
      </div>
      <div class="user-icon" onclick="toggleOverlay('overlay')">
        <img src="image/user.png" alt="user" />
      </div>
    </div>
    <div class="container">
      <div class="grocery-list">
        <h2>GROCERY LIST</h2>

        <ul id="listgrocery">
            @if($items->isEmpty())         
              
            @else
              @foreach ($items as $item)
                <li>
                    <input type="checkbox" id="item{{ $item->id }}-checkbox"
                    data-id="{{ $item->id }}"
                    {{ $item->isChecked ? 'checked' : '' }}
                    onclick="toggleCheckbox({{ $item->id }}, this.checked)"/>
                    <input class="{{ $item->isChecked ? 'disabled' : '' }}" type="text" id="item{{ $item->id }}-text" placeholder="enter item name"  value = "{{$item->item_name}}" onkeyup="updateBarang({{ $item->id }}, event)" />
                    <button id="item{{ $item->id }}-edit-btn" class="edit-btn {{ $item->isChecked ? 'disabled' : '' }}" onclick="editItem({{ $item->id }})">
                        <img src="image/edit.png" alt="Edit" />
                    </button>
                    <button id="item{{ $item->id }}-delete-btn" class="delete-btn {{ $item->isChecked ? 'disabled' : '' }}" onclick="deleteItem({{ $item->id }})">
                        <img src="image/delete.png" alt="Delete" />
                    </button>
                </li>
              @endforeach
            @endif
            
        </ul>
        <div class="grocery-footer">
          <div class="actions">
            <button class="add-btn" onclick="addNewItem()">ADD</button>
            <button class="clear-btn" onclick="clearAllItem()">CLEAR ALL</button>
          </div>
        </div>
      </div>
      <div class="ads">
        <h2>Advertisements</h2>
        <p>Ad content goes here</p>
      </div>
      <div class="item-details" >
        <h2>ITEM DETAILS</h2>
        <form>
          <div class="form-group">
            <label for="product-name">Product Name</label>
            <input type="text" id="product-name" name="product-name" disabled="true"/>
          </div>
          <div class="form-group">
            <label for="price-per-unit"
              >Price Per Unit (Rp)<span class="tab"></span>Qty</label
            >
            <div class="price-unit-container">
              <input type="text" id="price-per-unit" name="price-per-unit" class="disabled" />
              <input type="text" id="quantity" name="quantity" class="disabled" />
              <select id="unit-type" name="unit-type" class="disabled">
                <option value="Kg">Kg</option>
                <option value="Pcs">Pcs</option>
                <option value="L">L</option>
              </select>
            </div>
          </div>
          <div class="total">
            <h4>Total</h4>
            <h2>Rp<span id="output"></span>,-</h2>
          </div>
          <div class="save">
            <button id='done-btn' class="done">DONE</button>
            <button id='cancel-btn'class="cancel">CANCEL</button>
          </div>
        </form>
      </div>
      <div class="monthly-expense">
        <h2>pengeluaran anda bulan ini :</h2>
        <div class="expense">Rp00,-</div>
      </div>
      <div class="calendar">
        <div class="calendar-header">
          <button class="prev-month">
            <img src="image/back.png" alt="Previous Month" />
          </button>
          <div class="month-year">
            <h2>JUNE</h2>
            <h3>2024</h3>
          </div>
          <button class="next-month">
            <img src="image/next.png" alt="Next Month" />
          </button>
        </div>
        <div class="days">
          <!-- Calendar days will go here -->
          <div onclick="toggleOverlay('receipt-overlay', '01')">1</div>
          <div onclick="toggleOverlay('receipt-overlay', '02')">2</div>
          <div onclick="toggleOverlay('receipt-overlay', '03')">3</div>
          <div onclick="toggleOverlay('receipt-overlay', '04')">4</div>
          <div onclick="toggleOverlay('receipt-overlay', '05')">5</div>
          <div onclick="toggleOverlay('receipt-overlay', '06')">6</div>
          <div onclick="toggleOverlay('receipt-overlay', '07')">7</div>
          <div onclick="toggleOverlay('receipt-overlay', '08')">8</div>
          <div onclick="toggleOverlay('receipt-overlay', '09')">9</div>
          <div onclick="toggleOverlay('receipt-overlay', 10)">10</div>
          <div onclick="toggleOverlay('receipt-overlay', 11)">11</div>
          <div onclick="toggleOverlay('receipt-overlay', 12)">12</div>
          <div onclick="toggleOverlay('receipt-overlay', 13)">13</div>
          <div onclick="toggleOverlay('receipt-overlay', 14)">14</div>
          <div onclick="toggleOverlay('receipt-overlay', 15)">15</div>
          <div onclick="toggleOverlay('receipt-overlay', 16)">16</div>
          <div onclick="toggleOverlay('receipt-overlay', 17)">17</div>
          <div onclick="toggleOverlay('receipt-overlay', 18)">18</div>
          <div onclick="toggleOverlay('receipt-overlay', 19)">19</div>
          <div onclick="toggleOverlay('receipt-overlay', 20)">20</div>
          <div onclick="toggleOverlay('receipt-overlay', 21)">21</div>
          <div onclick="toggleOverlay('receipt-overlay', 22)">22</div>
          <div onclick="toggleOverlay('receipt-overlay', 23)">23</div>
          <div onclick="toggleOverlay('receipt-overlay', 24)">24</div>
          <div onclick="toggleOverlay('receipt-overlay', 25)">25</div>
          <div onclick="toggleOverlay('receipt-overlay', 26)">26</div>
          <div onclick="toggleOverlay('receipt-overlay', 27)">27</div>
          <div onclick="toggleOverlay('receipt-overlay', 28)">28</div>
          <div onclick="toggleOverlay('receipt-overlay', 29)">29</div>
          <div onclick="toggleOverlay('receipt-overlay', 30)">30</div>
          <!-- <div onclick="toggleOverlay('receipt-overlay')">31</div> -->
        </div>
      </div>
    </div>
    </body>
    </html>
    <!-- Overlay HTML -->
<div class="overlay" id="overlay">
    <div class="user-menu" onclick="event.stopPropagation()">
        <div class="user-menu-header">
            <div class="theme-icon">
                <!-- You can add a theme icon here if needed -->
            </div>
            <div class="user-icon">
                <img src="image/userOpen.png" alt="User">
            </div>
        </div>
        <div class="user-menu-body">
            <div class="menu-item-top">
                <span style="font-size:24px;">
                    <img src="image/theme.png" alt="">
                </span>
                <button class onclick="toggleOverlay('theme-overlay')">Change Theme</button>
            </div>
            <div class="menu-item-bottom">
                <span style="font-size:24px;">
                    <img src="image/logout.png" alt="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                </span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
                <button class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
                </button>
            </div>
        </div>
    </div>
</div>


    <!-- Theme Change Overlay -->
    <div class="overlay" id="theme-overlay" onclick="toggleOverlay('theme-overlay')">
      <div class="theme-menu" onclick="event.stopPropagation()">
        <h2>Choose a Theme</h2>
        <button class="theme-option-top" onclick="changeTheme('pinkMode')">
          <span>
            <img src="image/circlePink.png" alt="" />
          </span>
          <tab>PINK<tab>
          <span>
            <img src="image/circlePink.png" alt="" />
          </span>
        </button>
        <button class="theme-option-bottom" onclick="changeTheme('greenMode')">
            <span>
                <img src="image/circleGreen.png" alt="" />
              </span>
              <tab>GREEN<tab>
              <span>
                <img src="image/circleGreen.png" alt="" />
              </span>
        </button>
        <button class="theme-option-cancel" onclick="toggleOverlay('theme-overlay')">CANCEL</button>
      </div>
    </div>

    <!-- Receipt Overlay-->
  <div class="overlay" id="receipt-overlay" onclick="toggleOverlay('receipt-overlay')">
    <div class="receipt" onclick="event.stopPropagation()">
      <img class="close" src="image/close.png" alt="" onclick="toggleOverlay('receipt-overlay')">
      <img class="receiptLogo" src="image/logo.png" alt="">
      <h1>RECEIPT</h1>
      <div class="date">
        <strong>DATE: <span id="dateReceipt"></span></strong>
      </div>
      <hr />
      <table class="items">
        <thead>
          <tr>
            <th>Item</th>
            <th>Qty</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody id="receipt-items">
                <!-- Items will be dynamically added here -->
        </tbody>
      </table>
      <hr />
      <div class="total">
        <strong>Total:</strong>
        <strong><span id="totalReceipt"></span></strong>
      </div>
      <p class="design-credit">sho-cart</p>
    </div>
    </div>

    <script>
      function toggleOverlay(id, date) {
        const overlay = document.getElementById(id);
        if(id=="receipt-overlay" && date!=null){
          fetch(`/receipt/${date}`, {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              body: JSON.stringify({
                  date: `${date}`
              })
          })
          .then(response => response.json())
          .then(data => {
              console.log('Server response:', data);
              const itemDate = data.itemDate;

            // Update receipt date
            var stringDate = date+"/06/2024";
            document.getElementById('dateReceipt').textContent = stringDate;

            // Clear existing items
            const tbody = document.getElementById('receipt-items');
            tbody.innerHTML = '';

            let total = 0;

            if (itemDate && itemDate.length > 0) {
                itemDate.forEach(item => {
                    const row = document.createElement('tr');
                    var tempPrice = item.price * item.quantity;
                    row.innerHTML = `
                        <td>${item.item_name}</td>
                        <td>${item.quantity}</td>
                        <td>Rp${tempPrice}</td>
                    `;
                    tbody.appendChild(row);
                    total += tempPrice;
                });
            } else {
                const row = document.createElement('tr');
                row.innerHTML = `<td colspan="3">No items found for this date.</td>`;
                tbody.appendChild(row);
            }

            // Update total
            document.getElementById('totalReceipt').textContent = total;

            overlay.classList.toggle("active");
          })
          .catch(error => {
              console.error('Error:', error);
          });
        } else {
                overlay.classList.toggle("active");
        }
      }

      // Close overlay when clicking outside the user menu or theme menu
      document.querySelectorAll(".overlay").forEach((overlay) => {
        overlay.addEventListener("click", function (event) {
          if (event.target === this) {
            toggleOverlay(this.id);
          }
        });
      });
      window.addEventListener('load', function () {
          var theme = localStorage.getItem('theme');
          console.log(theme);
      })
      // Function to change theme
      function changeTheme(theme) {
        const baseUrl = 'http://localhost:8000';
        fetch(`/changeTheme/${theme}`, {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              body: JSON.stringify({
                  theme: theme
              })
          })
          .then(response => response.json())
          .then(data => {
              console.log(data);
              window.location.reload();
          })
          .catch(error => {
              console.error('Error:', error);
          });
      }

      function toggleCheckbox(itemId, checked) {
          fetch(`/toggle-checkbox/${itemId}`, {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              body: JSON.stringify({
                  isChecked: checked ? 1 : 0
              })
          })
          .then(response => response.json())
          .then(data => {
              console.log('Server response:', data);
              console.log(itemId);
              updateButtonState(itemId, checked); // Update button state based on server response
              updateDetailsState(itemId, data.item_name, checked, data.price, data.quantity, data.unit);
          })
          .catch(error => {
              console.error('Error:', error);
          });
          // window.location.reload();
          
      }

      function updateDetailsState(itemId, item_name, isChecked, price, quantity, unit){
    const doneButton = document.querySelector(`#done-btn`);
    const cancelButton = document.querySelector(`#cancel-btn`);

    function detailsDoneButton(event){

    }
    
    function detailsCancelButton(event){

    }

    if(isChecked){
            document.getElementById('product-name').value=item_name;
            document.getElementById('price-per-unit').classList.remove('disabled');
            if(price!=null){
              document.getElementById('price-per-unit').value=price;
            }
            document.getElementById('unit-type').classList.remove('disabled');
            if(price!=null){
              document.getElementById('unit-type').value=unit;
            }
            document.getElementById('quantity').classList.remove('disabled');
            if(price!=null){
              document.getElementById('quantity').value=quantity;
            }
            doneButton.disabled=false;
            cancelButton.disabled=false;

            doneButton.removeEventListener('click', detailsDone);
                cancelButton.removeEventListener('click', detailsCancel);
            function detailsDone(){
                event.preventDefault();
                updateItemDetails(itemId, item_name, isChecked, true);
                doneButton.removeEventListener('click', detailsDone);
                cancelButton.removeEventListener('click', detailsCancel);
            }

            function detailsCancel(){
                event.preventDefault();
                updateItemDetails(itemId, item_name, isChecked, false);
                doneButton.removeEventListener('click', detailsDone);
                cancelButton.removeEventListener('click', detailsCancel);
            }

            doneButton.addEventListener('click',  detailsDone);
            cancelButton.addEventListener('click', detailsCancel);

            var price = parseFloat(price); // Parse the value as a float
            var quantity = parseFloat(quantity); // Parse the value as a float
            var total = price * quantity;
            document.getElementById("output").innerHTML = total;
          } else {
            document.getElementById('product-name').value="";
            document.getElementById('price-per-unit').value="";
            document.getElementById('unit-type').value="";
            document.getElementById('quantity').value="";
            document.getElementById('price-per-unit').classList.add('disabled');
            document.getElementById('unit-type').classList.add('disabled');
            document.getElementById('quantity').classList.add('disabled');
            doneButton.disabled=true;
            cancelButton.disabled=true;
            // doneButton.removeEventListener('click', detailsDoneButton);
            // cancelButton.removeEventListener('click', detailsCancelButton);
          }
  }

      // function updateTotal(event){
      //   const ppu = document.querySelector(`#price-per-unit`);
      //   const qty = document.querySelector(`#quantity`);
      //   const total = document.querySelector(`#price-per-unit`);
      //   var price = parseFloat(ppu.value); // Parse the value as a float
      //   var quantity = parseFloat(qty.value); // Parse the value as a float
      //   var totalHarga = price * quantity;
      //   console.log($totalHarga)
      //   document.getElementById("totalHarga").innerHTML = totalHarga;
      // }

      function updateButtonState(itemId, isChecked) {
          const editButton = document.querySelector(`#item${itemId}-edit-btn`);
          const deleteButton = document.querySelector(`#item${itemId}-delete-btn`);
          const message = document.querySelector(`#item${itemId}-text`);

          if (isChecked) {
              editButton.classList.add('disabled');
              deleteButton.classList.add('disabled');
              message.classList.add('disabled');
              editButton.removeEventListener('click', editItem);
              deleteButton.removeEventListener('click', deleteItem);
          } else {
              editButton.classList.remove('disabled');
              deleteButton.classList.remove('disabled');
              message.classList.remove('disabled');
              editButton.addEventListener('click', () => editItem(itemId));
              deleteButton.addEventListener('click', () => deleteItem(itemId));
          }
      }

      function updateBarang(itemId, event){
        if (event.key === 'Enter' || event.keyCode === 13) {
          const message = document.querySelector(`#item${itemId}-text`);
          const baseUrl = 'http://localhost:8000';
          console.log(itemId, message.value, event.key);
                
                  fetch(`${baseUrl}/api/data`, {
                      method: 'PUT',
                      headers: {
                          'Content-Type': 'application/json',
                      },
                      body: JSON.stringify({id: itemId,barang: `${message.value}`})
                  })
                  .then(response => {
                      if (response.ok) {
                          return response.json();
                      }
                      return response.json();
                      // throw new Error('Network response was not ok.'+JSON.stringify(response));
                  })
                  .then(data => {
                      console.log('Success:', data);
                      window.location.reload();
                  })
                  .catch(error => {
                      console.error('Error:', error);
                  });
              }
      }

      function updateItemDetails(itemId, item_name, isChecked, status){
        console.log(itemId);
        const ppu = document.querySelector(`#price-per-unit`);
        const unit = document.querySelector(`#unit-type`);
        const qty = document.querySelector(`#quantity`);
        const doneButton = document.querySelector(`#done-btn`);
        const cancelButton = document.querySelector(`#cancel-btn`);
        const baseUrl = 'http://localhost:8000';
        if(status==true){
          console.log(itemId, ppu.value, unit.value, qty.value, item_name);
          const date = new Date();
          const tanggal = date.getDate();
          for(var i=1; i<10; i++){
            if(tanggal==i){
              tanggal = "0"+tanggal;
              tanggal = parseFloat(tanggal);
            }
          }
          console.log(JSON.stringify({id: itemId, price: `${ppu.value}`, unit: `${unit.value}`, quantity: `${qty.value}`, date: `${tanggal}`, namaBarang: item_name}))
                  fetch(`${baseUrl}/api/update`, {
                      method: 'POST',
                      headers: {
                          'Content-Type': 'application/json',
                      },
                      body: JSON.stringify({id: itemId, price: `${ppu.value}`, unit: `${unit.value}`, quantity: `${qty.value}`, date: `${tanggal}`, namaBarang: item_name})
                  })
                  .then(response => {
                      if (response.ok) {
                          return response.json();
                      }
                      return response.json();
                      // throw new Error('Network response was not ok.'+JSON.stringify(response));
                  })
                  .then(data => {
                      console.log('Success:', data);
                      document.getElementById('product-name').value="";
                      document.getElementById('price-per-unit').value="";
                      document.getElementById('unit-type').value="Kg";
                      document.getElementById('quantity').value="";
                      document.getElementById('price-per-unit').classList.add('disabled');
                      document.getElementById('unit-type').classList.add('disabled');
                      document.getElementById('quantity').classList.add('disabled');
                      // doneButton.removeEventListener('click', updateItemDetails);
                      // cancelButton.removeEventListener('click', updateItemDetails);
                      alert("The Item Details Are Saved");
                  })
                  .catch(error => {
                      console.error('Error:', error);
                  });
        } else {
          document.getElementById('product-name').value="";
          document.getElementById('price-per-unit').value="";
          document.getElementById('unit-type').value="Kg";
          document.getElementById('quantity').value="";
          document.getElementById('price-per-unit').classList.add('disabled');
          document.getElementById('unit-type').classList.add('disabled');
          document.getElementById('quantity').classList.add('disabled');
          // doneButton.removeEventListener('click', updateItemDetails);
          // cancelButton.removeEventListener('click', updateItemDetails);
        }
              
      }

      function addNewItem() {
          const groceryList = document.getElementById('listgrocery');
          const baseUrl = 'http://localhost:8000';
          fetch(`${baseUrl}/api/getID`)
                  .then(response => {
                      if (response.ok) {
                          return response.json();
                      }
                      return response.json();
                      // throw new Error('Network response was not ok.'+JSON.stringify(response));
                  })
                  .then(data => {
                      console.log('Success:', data);
                      const newItemId = data.newID;
                      var test = document.createElement('li')
          // Create new list item HTML
          const newItemHTML = `
              <li>
                <input type="checkbox" />
                <input type="text" id="item${newItemId}-text" placeholder="enter item name" />
                <button class="edit-btn">
                  <img src="image/edit.png" alt="Edit" />
                </button>
                <button class="delete-btn">
                  <img src="image/delete.png" alt="Delete" />
                </button>
              </li>  
          `;
          
          // Append the new item to the grocery list
          groceryList.insertAdjacentHTML('beforeend', newItemHTML);

          const message = document.querySelector(`#item${newItemId}-text`);
          
          message.addEventListener('keyup', e => {
              if (e.key === 'Enter' || e.keyCode === 13) {
                console.log(message.value);
                // fetch(`${baseUrl}/api/data`)
                // .then(response => response.json())
                // .then(data => console.log(data));
                  fetch(`${baseUrl}/api/data`, {
                      method: 'POST',
                      headers: {
                          'Content-Type': 'application/json',
                      },
                      body: JSON.stringify({barang: `${message.value}`})
                  })
                  .then(response => {
                      if (response.ok) {
                          return response.json();
                      }
                      return response.json();
                      // throw new Error('Network response was not ok.'+JSON.stringify(response));
                  })
                  .then(data => {
                      console.log('Success:', data);
                      window.location.reload();
                  })
                  .catch(error => {
                      console.error('Error:', error);
                  });
              }
          });

          groceryList.scrollTop = groceryList.scrollHeight;
          
                  })
                  .catch(error => {
                      console.error('Error:', error);
                  }); // Generate a unique ID for the new item
          
      }

      function clearAllItem(){
        const baseUrl = 'http://localhost:8000';
            fetch(`${baseUrl}/api/data`)
                  .then(response => {
                      if (response.ok) {
                          return response.json();
                      }
                      return response.json();
                      // throw new Error('Network response was not ok.'+JSON.stringify(response));
                  })
                  .then(data => {
                      console.log('Success:', data);
                      window.location.reload();
                  })
                  .catch(error => {
                      console.error('Error:', error);
                  });
            
            console.log('Cleared All');
      }
        function editItem(itemId) {
            const message = document.querySelector(`#item${newItemId}-text`);
            message.classList.remove('disabled');
          //   message.addEventListener('keyup', e => {
          //     if (e.key === 'Enter' || e.keyCode === 13) {
          //       console.log(message.value);
          //         fetch(`${baseUrl}/api/data`, {
          //             method: 'POST',
          //             headers: {
          //                 'Content-Type': 'application/json',
          //             },
          //             body: JSON.stringify({barang: `${message.value}`})
          //         })
          //         .then(response => {
          //             if (response.ok) {
          //                 return response.json();
          //             }
          //             return response.json();
          //             // throw new Error('Network response was not ok.'+JSON.stringify(response));
          //         })
          //         .then(data => {
          //             console.log('Success:', data);
          //             window.location.reload();
          //         })
          //         .catch(error => {
          //             console.error('Error:', error);
          //         });
          //     }
          // });
            console.log('Edit item with ID:', itemId);
        }

        function deleteItem(itemId) {
          const baseUrl = 'http://localhost:8000';
            fetch(`${baseUrl}/api/data`, {
                      method: 'DELETE',
                      headers: {
                          'Content-Type': 'application/json',
                      },
                      body: JSON.stringify({itemID: `${itemId}`})
                  })
                  .then(response => {
                      if (response.ok) {
                          return response.json();
                      }
                      return response.json();
                      // throw new Error('Network response was not ok.'+JSON.stringify(response));
                  })
                  .then(data => {
                      console.log('Success:', data);
                      window.location.reload();
                  })
                  .catch(error => {
                      console.error('Error:', error);
                  });
            
            console.log('Delete item with ID:', itemId);
        }

        
    </script>
  </body>
</html>

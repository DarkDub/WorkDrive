<style>
    .customer-info-card {
  background-color: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  padding: 20px;
  max-width: 600px;
  margin: auto;
}

.info-header {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.profile-img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  margin-right: 20px;
}

.customer-details {
  flex-grow: 1;
}

.customer-name {
  font-size: 20px;
  font-weight: 600;
  color: #333;
}

.customer-email, .customer-ip {
  font-size: 14px;
  color: #777;
}

.blacklist-btn {
  padding: 10px 20px;
  background-color: #e53e3e;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 14px;
}

.blacklist-btn:hover {
  background-color: #c53030;
}

.delivery-section, .shipping-section, .payment-section {
  margin-top: 20px;
  padding: 10px;
  background-color: #f7fafc;
  border-radius: 8px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
}

h3 {
  font-size: 16px;
  color: #333;
  margin-bottom: 10px;
}

.card-icon {
  width: 30px;
  height: 30px;
  margin-top: 10px;
}

</style>

<section class="customer-info-card">
    <div class="info-header">
      <img src="path_to_image.jpg" alt="Profile Picture" class="profile-img" />
      <div class="customer-details">
        <h2 class="customer-name">Lucian Obrien</h2>
        <p class="customer-email">ashlynn.ohara62@gmail.com</p>
        <p class="customer-ip">IP address: 192.158.1.38</p>
        <button class="blacklist-btn">+ Add to Blacklist</button>
      </div>
    </div>
    
    <div class="delivery-section">
      <h3>Delivery</h3>
      <p>Ship by: DHL</p>
      <p>Speedy: Standard</p>
      <p>Tracking No: SPX037739199373</p>
    </div>
    
    <div class="shipping-section">
      <h3>Shipping</h3>
      <p>Address: 19034 Verna Unions Apt. 164 - Honolulu, RI / 87535</p>
      <p>Phone number: 365-374-4961</p>
    </div>
    
    <div class="payment-section">
      <h3>Payment</h3>
      <p>**** **** **** 5678</p>
      <img src="card_icon.png" alt="Card Icon" class="card-icon" />
    </div>
  </section>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin-dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
       <!-- aside section start -->
        <aside>
            <div class="top">
             <div class="logo">
              <h2>C<span class="danger">E-SHOP</span></h2>
             </div>
             <div class="close" id="close_btn">
             <span class="material-symbols-outlined"> close </span>
             </div>
            </div>
            <!-- end top -->
            <div class="sidebar">
                <a href="#">
                <span class="material-symbols-outlined"> grid_view </span>
                <h3>Dashboard</h3>
                </a>
                <a href="#" class="active">
                <span class="material-symbols-outlined"> person_outline </span>
                <h3>customers</h3>
                </a>
                <a href="#">
                <span class="material-symbols-outlined"> insights </span>
                <h3>Analytics</h3>
                </a>
                <a href="#">
                <span class="material-symbols-outlined"> mail_outline </span>
                <h3>Messages</h3>
                <span class="msg_count">14</span>
                </a>
                <a href="#">
                <span class="material-symbols-outlined"> receipt_long </span>
                <h3>Products</h3>
                </a>
                <a href="manage_users.php">
                <span class="material-symbols-outlined"> manage_accounts </span>
                <h3>Manager Users</h3>
                </a>
                <a href="#">
                <span class="material-symbols-outlined"> report_gmailerrorred </span>
                <h3>Reports</h3>
                </a>
                <a href="#">
                <span class="material-symbols-outlined"> settings </span>
                <h3>Settings</h3>
                </a>
                <a href="#">
                <span class="material-symbols-outlined"> add </span>
                <h3>Add Product</h3>
                </a>
                <a href="#">
                <span class="material-symbols-outlined"> logout </span>
                <h3>Logout</h3>
                </a>
            </div>


        </aside> 
        <!-- aside section end -->

        <!-- main section start -->
        <main class="home">
             <h1>Dashboard</h1>

              <div class="date">
               <input type="date">
              </div>
            <div class="insights">
                <!-- start selling -->
                  <div class="sales">
                     <span class="material-symbols-outlined">trending_up</span>
                      <div class="middle">
                        <div class="left">
                            <h3>Total Sales</h3>
                            <h1>$25,023</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle r="30" cy="40" cx="40"></circle>
                            </svg>
                            <div class="number">80%</div>
                        </div>
                      </div>
                      <small class="small">last 24 Hours</small>
                  </div>
                <!-- end selling -->

                <!-- start expenses -->
                  <div class="expenses">
                     <span class="material-symbols-outlined">local_mall</span>
                      <div class="middle">
                        <div class="left">
                            <h3>Expenses</h3>
                            <h1>$25,023</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle r="30" cy="40" cx="40"></circle>
                            </svg>
                            <div class="number">80%</div>
                        </div>
                      </div>
                      <small class="small">last 24 Hours</small>
                  </div>
                <!-- end expenses -->

                
                <!-- start income -->
                  <div class="income">
                     <span class="material-symbols-outlined">stacked_line_chart</span>
                      <div class="middle">
                        <div class="left">
                            <h3>Income</h3>
                            <h1>$25,023</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle r="30" cy="40" cx="40"></circle>
                            </svg>
                            <div class="number">80%</div>
                        </div>
                      </div>
                      <small class="small">last 24 Hours</small>
                  </div>
                <!-- end income -->
            </div>
            <!-- end inside -->
              <!-- start recent order -->
                <div class="recent_order">
                 <h1>Recent Orders</h1>
                  <table>
                    <thead>

                        <tr>
                            <th>Product Name</th>
                            <th>Product Number</th>
                            <th>Payments</th>
                            <th>Status</th>
                        </tr>

                    </thead>
                    <tbody>

                        <tr>
                            <td>Mini USB</td>
                            <td>456</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Mini USB</td>
                            <td>456</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Mini USB</td>
                            <td>456</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Mini USB</td>
                            <td>456</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>

                    </tbody>
                  
                  </table>
                </div>



              <!-- end recent order --> 
        </main>
        <!-- main section end -->

        <!-- right section start -->
            <div class="right">
                <div class="top">
                    <button id="menu_bar">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                  <div class="theme-toggler">
                    <span class="material-symbols-outlined active">light_mode</span>
                    <span class="material-symbols-outlined">dark_mode</span>
                  </div>
                  <div class="profile">
                   <div class="info">
                     <p><b>FRED</b></p>
                     <p>Admin</p>
                     <small class="text-muted"></small>
                   </div>
                    <div class="profile-photo">
                        <img src="image/profile-1.svg" alt="">
                    </div>
                  </div>
                </div>

                    <!-- end top -->

                    <!-- start recent updates -->
                <div class="recent_updates">
                    <h2>Recent Updates</h2>
                    <div class="updates">
                        <div class="update">
                            <div class="profile-photo">
                                <img src="image/profile-2.svg" alt="">
                            </div>
                            <div class="Message">
                                <p><b>Retired</b> Received his order.</p>
                            </div>
                        </div>
                        <div class="update">
                            <div class="profile-photo">
                                <img src="image/profile-3.svg" alt="">
                            </div>
                            <div class="Message">
                                <p><b>Binvenue</b> Received his order.</p>
                            </div>
                        </div>
                        <div class="update">
                            <div class="profile-photo">
                                <img src="image/profile-4.svg" alt="">
                            </div>
                            <div class="Message">
                                <p><b>Muteba</b> Received his order.</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- end recent update -->

                <!-- start sale analytic -->
                    <div class="sales_analytics">
                        <h2>Sales Analytics</h2>

                            <div class="item online">
                                <div class="icon">
                                    <span class="material-symbols-outlined">shopping_cart</span>
                                </div>
                                <div class="right_text">
                                    <div class="info">
                                        <h3>Online Orders</h3>
                                        <small class="text-muted">Last seen 2 Hours</small>
                                    </div>
                                        <h5 class="danger">-17%</h5>
                                        <h3>3849</h3>
                                </div>
                            </div>
                            <div class="item online">
                                <div class="icon">
                                    <span class="material-symbols-outlined">shopping_cart</span>
                                </div>
                                <div class="right_text">
                                    <div class="info">
                                        <h3>Online Orders</h3>
                                        <small class="text-muted">Last seen 2 Hours</small>
                                    </div>
                                        <h5 class="danger">-17%</h5>
                                        <h3>3849</h3>
                                </div>
                            </div>
                            <div class="item online">
                                <div class="icon">
                                    <span class="material-symbols-outlined">shopping_cart</span>
                                </div>
                                <div class="right_text">
                                    <div class="info">
                                        <h3>Online Orders</h3>
                                        <small class="text-muted">Last seen 2 Hours</small>
                                    </div>
                                        <h5 class="danger">-17%</h5>
                                        <h3>3849</h3>
                                </div>
                            </div>

                    </div>
                <!-- end sale analytic -->
                <div class="item add_products">
                    <div>
                    <span class="material-symbols-outlined">add</span>
                    </div>
                </div>
            </div>

        <!-- right section end -->
    </div>
    

    <script src="script.js"></script>
</body>
</html>

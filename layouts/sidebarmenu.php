<aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
        <div class="mdc-drawer__header">
        <a href="index.php" class="brand-logo">
            <img src="lib/images/logo.svg" alt="logo">
        </a>
        </div>
        <div class="mdc-drawer__content">
    <div class="user-info">
        <p class="name"><?php echo $_SESSION['full_name']; ?></p>
        <p class="email"><?php echo $_SESSION['email_add']; ?></p>
    </div>
    <div class="mdc-list-group">
        <nav class="mdc-list mdc-drawer-menu">
        <div class="mdc-list-item mdc-drawer-item">
            <a class="mdc-drawer-link" href="dashboard.php">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
            Dashboard
            </a>
        </div>
        <div class="mdc-list-item mdc-drawer-item">
            <a class="mdc-drawer-link" href="boarders.php">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">people</i>
            Boarders
            </a>
        </div>
        <div class="mdc-list-item mdc-drawer-item">
            <a class="mdc-drawer-link" href="assign.php">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">folder_shared</i>
            Assign Boarder/Room
            </a>
        </div>
        <div class="mdc-list-item mdc-drawer-item">
            <a class="mdc-drawer-link" href="rooms.php">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">location_city</i>
            Rooms
            </a>
        </div>
        <div class="mdc-list-item mdc-drawer-item">
            <a class="mdc-drawer-link" href="payments.php">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">payment</i>
            Payments
            </a>
        </div>
        <div class="mdc-list-item mdc-drawer-item">
            <a class="mdc-drawer-link" href="bills.php">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">receipt</i>
            Bills / SOA
            </a>
        </div>
        <div class="mdc-list-item mdc-drawer-item">
            <a class="mdc-drawer-link" href="items.php">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">devices_other</i>
            Other Charges
            </a>
        </div>
        <div class="mdc-list-item mdc-drawer-item">
            <a class="mdc-drawer-link" href="reports.php">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">pie_chart_outlined</i>
            Reports
            </a>
        </div>        
        </nav>
    </div>
</div>
    </aside>
<!-- ========== Master ========== -->
<div class="app-menu navbar-menu">

    <div class="navbar-brand-box">
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('build/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('build/images/logo-dark.png')); ?>" alt="" height="17">
            </span>
        </a>

        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('build/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('build/images/logo-light.png')); ?>" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span><?php echo app('translator')->get('translation.menu'); ?></span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(URL::asset('index')); ?>" >
                        <i class="ri-dashboard-2-line"></i> <span><?php echo app('translator')->get('translation.dashboards'); ?></span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span>Master</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarCalendar">
                                    Branch/Franchise
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCalendar">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-calendar" class="nav-link"> Branch </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-calendar-month-grid" class="nav-link"> Franchise </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link">ERP Users</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-user-roles" class="nav-link">ERP User Roles</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarEmail" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail">
                                    <?php echo app('translator')->get('translation.email'); ?>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarEmail">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-mailbox" class="nav-link"><?php echo app('translator')->get('translation.mailbox'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebaremailTemplates" class="nav-link"
                                                data-bs-toggle="collapse" role="button" aria-expanded="false"
                                                aria-controls="sidebaremailTemplates">
                                                <?php echo app('translator')->get('translation.email-templates'); ?>
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebaremailTemplates">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="apps-email-basic" class="nav-link">
                                                            <?php echo app('translator')->get('translation.basic-action'); ?> </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="apps-email-ecommerce" class="nav-link">
                                                            <?php echo app('translator')->get('translation.ecommerce-action'); ?> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarEcommerce" class="nav-link" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false"
                                    aria-controls="sidebarEcommerce"><?php echo app('translator')->get('translation.ecommerce'); ?>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarEcommerce">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-products" class="nav-link"><?php echo app('translator')->get('translation.products'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-product-details"
                                                class="nav-link"><?php echo app('translator')->get('translation.product-Details'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-add-product"
                                                class="nav-link"><?php echo app('translator')->get('translation.create-product'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-orders" class="nav-link"><?php echo app('translator')->get('translation.orders'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-order-details"
                                                class="nav-link"><?php echo app('translator')->get('translation.order-details'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-customers" class="nav-link"><?php echo app('translator')->get('translation.customers'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-cart" class="nav-link"><?php echo app('translator')->get('translation.shopping-cart'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-checkout" class="nav-link"><?php echo app('translator')->get('translation.checkout'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-sellers" class="nav-link"><?php echo app('translator')->get('translation.sellers'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-seller-details"
                                                class="nav-link"><?php echo app('translator')->get('translation.sellers-details'); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarProjects" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarProjects"><?php echo app('translator')->get('translation.projects'); ?>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarProjects">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-projects-list" class="nav-link"><?php echo app('translator')->get('translation.list'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-projects-overview" class="nav-link"><?php echo app('translator')->get('translation.overview'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-projects-create" class="nav-link"><?php echo app('translator')->get('translation.create-project'); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTasks" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarTasks"><?php echo app('translator')->get('translation.tasks'); ?>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTasks">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-tasks-kanban" class="nav-link"><?php echo app('translator')->get('translation.kanbanboard'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tasks-list-view" class="nav-link"><?php echo app('translator')->get('translation.list-view'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tasks-details" class="nav-link"><?php echo app('translator')->get('translation.task-details'); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCRM" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarCRM"><?php echo app('translator')->get('translation.crm'); ?>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCRM">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-crm-contacts" class="nav-link"><?php echo app('translator')->get('translation.contacts'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-companies" class="nav-link"><?php echo app('translator')->get('translation.companies'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-deals" class="nav-link"><?php echo app('translator')->get('translation.deals'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-leads" class="nav-link"><?php echo app('translator')->get('translation.leads'); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCrypto" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarCrypto"><?php echo app('translator')->get('translation.crypto'); ?>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCrypto">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-crypto-transactions" class="nav-link"><?php echo app('translator')->get('translation.transactions'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-buy-sell" class="nav-link"><?php echo app('translator')->get('translation.buy-sell'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-orders" class="nav-link"><?php echo app('translator')->get('translation.orders'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-wallet" class="nav-link"><?php echo app('translator')->get('translation.my-wallet'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-ico" class="nav-link"><?php echo app('translator')->get('translation.ico-list'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-kyc" class="nav-link"><?php echo app('translator')->get('translation.kyc-application'); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarInvoices" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarInvoices"><?php echo app('translator')->get('translation.invoices'); ?>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarInvoices">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-invoices-list" class="nav-link"><?php echo app('translator')->get('translation.list-view'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-invoices-details" class="nav-link"><?php echo app('translator')->get('translation.details'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-invoices-create" class="nav-link"><?php echo app('translator')->get('translation.create-invoice'); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTickets" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarTickets"><?php echo app('translator')->get('translation.supprt-tickets'); ?>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTickets">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-tickets-list" class="nav-link"><?php echo app('translator')->get('translation.list-view'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tickets-details" class="nav-link"><?php echo app('translator')->get('translation.ticket-details'); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarnft" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarnft">
                                    <?php echo app('translator')->get('translation.nft-marketplace'); ?>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarnft">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-nft-marketplace" class="nav-link"> <?php echo app('translator')->get('translation.marketplace'); ?> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-explore" class="nav-link"> <?php echo app('translator')->get('translation.explore-now'); ?> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-auction" class="nav-link"> <?php echo app('translator')->get('translation.live-auction'); ?> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-item-details" class="nav-link"> <?php echo app('translator')->get('translation.item-details'); ?> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-collections" class="nav-link"> <?php echo app('translator')->get('translation.collections'); ?> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-creators" class="nav-link"> <?php echo app('translator')->get('translation.creators'); ?> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-ranking" class="nav-link"> <?php echo app('translator')->get('translation.ranking'); ?> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-wallet" class="nav-link"> <?php echo app('translator')->get('translation.wallet-connect'); ?> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-create" class="nav-link"> <?php echo app('translator')->get('translation.create-nft'); ?> </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="apps-file-manager" class="nav-link"> <span><?php echo app('translator')->get('translation.file-manager'); ?></span></a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-todo" class="nav-link"> <span><?php echo app('translator')->get('translation.to-do'); ?></span></a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarjobs" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarjobs"> <?php echo app('translator')->get('translation.jobs'); ?></a>
                                <div class="collapse menu-dropdown" id="sidebarjobs">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-job-statistics" class="nav-link"> <?php echo app('translator')->get('translation.statistics'); ?> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebarJoblists" class="nav-link" data-bs-toggle="collapse"
                                                role="button" aria-expanded="false" aria-controls="sidebarJoblists">
                                                <?php echo app('translator')->get('translation.job-lists'); ?>
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebarJoblists">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="apps-job-lists" class="nav-link"> <?php echo app('translator')->get('translation.list'); ?>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="apps-job-grid-lists" class="nav-link">
                                                            <?php echo app('translator')->get('translation.grid'); ?> </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="apps-job-details" class="nav-link">
                                                            <?php echo app('translator')->get('translation.overview'); ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebarCandidatelists" class="nav-link"
                                                data-bs-toggle="collapse" role="button" aria-expanded="false"
                                                aria-controls="sidebarCandidatelists">
                                                <?php echo app('translator')->get('translation.candidate-lists'); ?>
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebarCandidatelists">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="apps-job-candidate-lists" class="nav-link">
                                                            <?php echo app('translator')->get('translation.list-view'); ?>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="apps-job-candidate-grid" class="nav-link">
                                                            <?php echo app('translator')->get('translation.grid-view'); ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-job-application" class="nav-link"> <?php echo app('translator')->get('translation.application'); ?> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-job-new" class="nav-link"> <?php echo app('translator')->get('translation.new-job'); ?> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-job-companies-lists" class="nav-link"> <?php echo app('translator')->get('translation.companies-list'); ?>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-job-categories" class="nav-link"> <?php echo app('translator')->get('translation.job-categories'); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="apps-api-key" class="nav-link"> <?php echo app('translator')->get('translation.api-key'); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>

    </div>
    <div class="sidebar-background"></div>
</div>

<div class="vertical-overlay"></div><?php /**PATH C:\wamp64\www\moneyfrog_erp\resources\views/layouts/erp_sidebar.blade.php ENDPATH**/ ?>
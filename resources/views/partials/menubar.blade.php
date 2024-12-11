<div id="sidebar-menu">
    <ul class="metismenu" id="side-menu">
        <li class="menu-title">@lang('global.title')</li>
        <li>
            <a href="{{ route('dashboard') }}" >
                <i class="fe-monitor"></i>
                <span>@lang("cruds.favorites.title")</span>
            </a>
        </li>
        <li>
            <a href="#" >
                <i class="fe-folder-plus"></i>
                <span>@lang("cruds.registration.title")</span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="true">
                <li>
                    <a href="#">
                        <span>@lang("cruds.supplier.title")</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>@lang("cruds.customer.title")</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>@lang("cruds.branch.title")</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>@lang("cruds.banks.title")</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" >
                <i class="fe-award"></i>
                <span>@lang("cruds.expenses.title")</span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="true">
                <li>
                    <a href="#">
                        <span>@lang("cruds.payment_center.title")</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" >
                <i class="dripicons-wallet"></i>
                <span>@lang("cruds.revenues.title")</span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="true">
                <li>
                    <a href="#">
                        <span>@lang("cruds.revenue_center.title")</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" >
                <i class="fe-truck"></i>
                <span>@lang("cruds.bank_movement.title")</span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="true">
                <li>
                    <a href="#">
                        <span>@lang("cruds.bank_balances.title")</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>@lang("cruds.bank_transactions.title")</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>@lang("cruds.bank_reconciliation.title")</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" >
                <i class="fe-clipboard"></i>
                <span>@lang("cruds.reports.title")</span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="true">
                <li>
                    <a href="#">
                        <span>@lang("cruds.bank_movement.title")</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>@lang("cruds.completed_payments.title")</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>@lang("cruds.open_expenses.title")</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>@lang("cruds.system_log.title")</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>@lang("cruds.cash_flow.title")</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" >
                <i class="far fa-money-bill-alt"></i>
                <span>@lang("cruds.budget.title")</span>
            </a>
        </li>
        <li>
            <a href="#" >
                <i class="fe-settings"></i>
                <span>@lang("cruds.settings.title")</span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="true">
                <li>
                    <a href="javascript: void(0);" aria-expanded="false">@lang("cruds.registration_management.title")
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level nav collapse" aria-expanded="false">
                        <li>
                            <a href="javascript: void(0);">@lang("cruds.expense_classification.title")</a>
                        </li>
                        <li>
                            <a href="javascript: void(0);">@lang("cruds.cost_center_registration.title")</a>
                        </li>
                        <li>
                            <a href="javascript: void(0);">@lang("cruds.brand.title")</a>
                        </li>
                        <li>
                            <a href="{{ route('users.index')}}">@lang("cruds.user_management.title")</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">@lang("cruds.audit_log.title")</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
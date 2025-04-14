<!-- resources/views/pages/app/transaction/cart.blade.php -->

<x-layouts.app title="Keranjang Belanja">
    @push('app-style')
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #0ea5e9;
            --light: #f8fafc;
            --dark: #1e293b;
        }

        .cart-page {
            background-color: #f3f4f6;
        }

        .cart-container {
            padding: 2rem 0;
        }

        .cart-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            background-color: white;
            margin-bottom: 2rem;
        }

        .cart-card-header {
            background-color: white;
            border-bottom: 1px solid #e5e7eb;
            border-radius: 12px 12px 0 0 !important;
            padding: 1.25rem 1.5rem;
        }

        .cart-card-body {
            padding: 1.5rem;
        }

        .checkout-step {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .step-number {
            width: 28px;
            height: 28px;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.875rem;
            margin-right: 0.75rem;
        }

        .step-title {
            font-weight: 600;
            font-size: 1.125rem;
            color: var(--dark);
        }

        .cart-page__table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            margin-bottom: 0;
        }

        .cart-page__table th {
            background-color: #f8fafc;
            padding: 1rem;
            font-weight: 600;
            color: var(--dark);
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        .cart-page__table td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        .cart-page__table__meta {
            display: flex;
            align-items: center;
        }

        .cart-page__table__meta__img {
            width: 80px;
            height: 60px;
            border-radius: 8px;
            overflow: hidden;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .cart-page__table__meta__img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cart-page__table__meta__title {
            font-weight: 600;
            font-size: 1rem;
            margin: 0;
        }

        .cart-page__table__meta__title a {
            color: var(--dark);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .cart-page__table__meta__title a:hover {
            color: var(--primary);
        }

        .cart-page__table__price,
        .cart-page__table__total {
            font-weight: 600;
            color: var(--dark);
        }

        .cart-page__table__remove {
            background: none;
            border: none;
            color: #ef4444;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }

        .cart-page__table__remove:hover {
            background-color: #fee2e2;
        }

        .cart-page__cart-checkout {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            background-color: white;
            overflow: hidden;
        }

        .cart-page__cart-total {
            padding: 0;
            margin: 0;
        }

        .cart-page__cart-total__top {
            background-color: #f8fafc;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .cart-page__cart-total__title {
            margin: 0;
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--dark);
        }

        .cart-page__cart-total__amount {
            display: flex;
            justify-content: space-between;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .cart-page__cart-total__amount__title {
            color: #64748b;
        }

        .cart-page__cart-total__amount__text {
            font-weight: 600;
            color: var(--dark);
        }

        .cart-page__cart-total__address {
            padding: 1.5rem;
        }

        .cart-page__cart-total__address__title {
            margin-top: 0;
            margin-bottom: 1rem;
            font-weight: 600;
            font-size: 1rem;
            color: var(--dark);
        }

        .cart-page__cart-total__address__list {
            margin: 0;
            padding-left: 1.25rem;
        }

        .cart-page__cart-total__address__list__item {
            position: relative;
            padding-left: 0.5rem;
            color: #475569;
            margin-bottom: 0.5rem;
            line-height: 1.5;
        }

        .cart-page__button {
            padding: 1.5rem;
            text-align: center;
            background-color: #f8fafc;
            border-top: 1px solid #e5e7eb;
        }

        .eduhive-btn--checkout {
            display: inline-block;
            padding: 1rem 2rem;
            background-color: var(--primary);
            color: white;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .eduhive-btn--checkout:hover {
            background-color: var(--primary-dark);
            color: white;
        }

        .guarantee-box {
            background-color: #f0fdf4;
            border-radius: 8px;
            border-left: 4px solid #10b981;
            padding: 1rem;
            margin-top: 1.5rem;
        }

        .secure-badge {
            font-size: 0.875rem;
            color: #64748b;
            text-align: center;
            margin-top: 1rem;
        }

        .benefits-list {
            padding-left: 1.25rem;
            margin-top: 1.5rem;
        }

        .benefits-list li {
            margin-bottom: 0.5rem;
            position: relative;
            padding-left: 0.5rem;
            color: #475569;
        }

        .benefits-list li::before {
            content: "\2713";
            color: #10b981;
            position: absolute;
            left: -1rem;
            font-weight: bold;
        }

        .alert {
            border-radius: 8px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background-color: #f0fdf4;
            border-left: 4px solid #10b981;
            color: #065f46;
        }

        .alert-danger {
            background-color: #fef2f2;
            border-left: 4px solid #ef4444;
            color: #b91c1c;
        }

        .course-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 0.5rem;
        }

        .course-badge-free {
            background-color: #ecfdf5;
            color: #059669;
        }

        .empty-cart {
            text-align: center;
            padding: 3rem 0;
        }

        .empty-cart__icon {
            font-size: 4rem;
            color: #cbd5e1;
            margin-bottom: 1rem;
        }

        .empty-cart__text {
            font-size: 1.25rem;
            color: #64748b;
            margin-bottom: 1.5rem;
        }

        .empty-cart__button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: var(--primary);
            color: white;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .empty-cart__button:hover {
            background-color: var(--primary-dark);
            color: white;
        }

        @media (max-width: 768px) {
            .cart-page__table__meta {
                flex-direction: column;
                align-items: flex-start;
            }

            .cart-page__table__meta__img {
                margin-bottom: 0.5rem;
                margin-right: 0;
            }
        }
    </style>
    @endpush

    <section class="cart-page section-space2 pt-6">
        <div class="container cart-container">
            <!-- Tampilkan pesan sukses atau error -->
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="row gutter-y-50">
                <div class="col-xl-8">
                    @if ($cartItems->isEmpty())
                        <div class="cart-card d-flex justify-content-center">
                            <div class="cart-card-body empty-cart">
                                <div class="empty-cart__icon">
                                    <i class="icon-basket"></i>
                                </div>
                                <p class="empty-cart__text">Keranjang Anda kosong.</p>
                                <a href="{{ route('app.course.index') }}" class="empty-cart__button">
                                    <i class="icon-grid"></i> Jelajahi Course
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="cart-card">
                            <div class="cart-card-header">
                                <div class="checkout-step">
                                    <div class="step-number">1</div>
                                    <div class="step-title">Ringkasan Belanja</div>
                                </div>
                            </div>
                            <div class="cart-card-body">
                                <div class="table-responsive">
                                    <table class="cart-page__table">
                                        <thead>
                                            <tr>
                                                <th>Course</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Sub Total</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cartItems as $cartItem)
                                                <tr>
                                                    <td>
                                                        <div class="cart-page__table__meta">
                                                            <div class="cart-page__table__meta__img">
                                                                <img src="{{ asset('storage/' . $cartItem->course->thumbnail) }}"
                                                                    alt="{{ $cartItem->course->title }}">
                                                            </div>
                                                            <h3 class="cart-page__table__meta__title">
                                                                <a href="{{ route('app.course.show', $cartItem->course->slug) }}">{{ $cartItem->course->title }}</a>
                                                                @if ($cartItem->course->price == 0)
                                                                    <span class="course-badge course-badge-free">Free</span>
                                                                @endif
                                                            </h3>
                                                        </div>
                                                    </td>
                                                    <td class="cart-page__table__price">
                                                        @if ($cartItem->course->price == 0)
                                                            Rp0
                                                        @else
                                                            Rp{{ number_format($cartItem->course->price, 0, ',', '.') }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $cartItem->quantity }}</td>
                                                    <td class="cart-page__table__total">
                                                        @if ($cartItem->course->price * $cartItem->quantity == 0)
                                                            Rp0
                                                        @else
                                                            Rp{{ number_format($cartItem->course->price * $cartItem->quantity, 0, ',', '.') }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('app.cart.remove', $cartItem->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="cart-page__table__remove">X</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                @if (!$cartItems->isEmpty())
                <div class="col-xl-4">
                    <div class="cart-page__cart-checkout">
                        <div class="cart-page__cart-total__top">
                            <h3 class="cart-page__cart-total__title">Ringkasan Pembayaran</h3>
                        </div>
                        <ul class="cart-page__cart-total list-unstyled">
                            <li class="cart-page__cart-total__amount cart-page__cart-total__amount--1">
                                <span class="cart-page__cart-total__amount__title">Subtotal</span>
                                <span class="cart-page__cart-total__amount__text">
                                    @if ($totalPrice == 0)
                                        Rp0
                                    @else
                                        Rp{{ number_format($totalPrice, 0, ',', '.') }}
                                    @endif
                                </span>
                            </li>
                            <li class="cart-page__cart-total__address">
                                <h4 class="cart-page__cart-total__address__title">Course yang Dipilih</h4>
                                <ul class="cart-page__cart-total__address__list list-unstyled">
                                    @foreach ($cartItems as $index => $cartItem)
                                        <li class="cart-page__cart-total__address__list__item">{{ $index + 1 }}.
                                            {{ $cartItem->course->title }}
                                            @if ($cartItem->course->price == 0)
                                                <span class="course-badge course-badge-free">Free</span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="guarantee-box mt-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="icon-shield me-2 text-success"></i>
                                        <h6 class="mb-0">Akses Seumur Hidup</h6>
                                    </div>
                                    <p class="mb-0 small">Beli sekali, akses materi pembelajaran selamanya</p>
                                </div>

                                <ul class="benefits-list">
                                    <li>Akses ke semua video pembelajaran</li>
                                    <li>Sertifikat penyelesaian</li>
                                    <li>Dukungan dari instruktur</li>
                                    <li>Akses ke grup komunitas</li>
                                </ul>
                            </li>
                        </ul>
                        <div class="cart-page__button">
                            <a href="{{ route('app.transaction.checkout') }}" class="eduhive-btn--checkout">
                                <span>Checkout Sekarang</span>
                            </a>
                            <div class="secure-badge mt-3">
                                <i class="icon-lock me-2"></i>Pembayaran aman & terenkripsi
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
</x-layouts.app>
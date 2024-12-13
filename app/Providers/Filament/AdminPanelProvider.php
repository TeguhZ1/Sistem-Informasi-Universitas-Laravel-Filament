<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->sidebarWidth('270px')
            ->maxContentWidth('full')
            ->navigationItems([
                NavigationItem::make('Dashboard')
                    ->icon('heroicon-o-home')
                    ->isActiveWhen(fn (): bool => request()->routeIs('filament.admin.pages.dashboard'))
                    ->url(fn (): string => route('filament.admin.pages.dashboard')),
            ])
            ->navigationGroups([
                NavigationGroup::make('Akademik')
                    ->items([
                        NavigationItem::make('Data Dosen')
                            ->icon('heroicon-o-academic-cap')
                            ->isActiveWhen(fn (): bool => request()->routeIs('filament.admin.resources.dosens.*'))
                            ->url(fn (): string => route('filament.admin.resources.dosens.index')),

                        NavigationItem::make('Data Mahasiswa')
                            ->icon('heroicon-o-academic-cap')
                            ->isActiveWhen(fn (): bool => request()->routeIs('filament.admin.resources.mahasiswas.*'))
                            ->url(fn (): string => route('filament.admin.resources.mahasiswas.index')),

                        NavigationItem::make('Mata Kuliah')
                            ->icon('heroicon-o-book-open')
                            ->isActiveWhen(fn (): bool => request()->routeIs('filament.admin.resources.mata-kuliahs.*'))
                            ->url(fn (): string => route('filament.admin.resources.mata-kuliahs.index')),

                        NavigationItem::make('Laporan Data Akademik')
                            ->icon('heroicon-o-document-text')
                            ->isActiveWhen(fn (): bool => request()->routeIs('filament.admin.pages.laporan'))
                            ->url(fn (): string => route('filament.admin.pages.laporan')),
                    ]),
            ])
            ->brandName('Sistem Informasi Universitas');
    }
}

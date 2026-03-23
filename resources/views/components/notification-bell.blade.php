<div
    x-data="safefoodNotificationBell()"
    x-init="init()"
    @keydown.escape.window="open = false"
    {{ $attributes->merge(['class' => 'relative']) }}
>
    <button
        type="button"
        @click="toggleDropdown()"
        class="sf-nav-toggle relative h-10 w-10 p-0 md:h-11 md:w-11"
        aria-label="Buka notifikasi"
        :aria-expanded="open"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 11-6 0m6 0H9" />
        </svg>
        <span
            x-show="unreadCount > 0"
            x-cloak
            x-text="badgeCount()"
            class="absolute -right-1 -top-1 inline-flex min-w-[1.2rem] items-center justify-center rounded-full bg-red-500 px-1.5 py-0.5 text-[10px] font-bold text-white"
        ></span>
    </button>

    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2 scale-[0.98]"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 -translate-y-2 scale-[0.98]"
        @click.outside="open = false"
        class="absolute right-0 top-[calc(100%+0.65rem)] z-[70] w-[22rem] max-w-[92vw]"
    >
        <div class="rounded-[1.5rem] border border-white/30 bg-white/85 p-3 shadow-[0_24px_70px_rgba(2,8,23,0.25)] backdrop-blur-xl dark:border-slate-700/80 dark:bg-slate-950/88">
            <div class="flex items-center justify-between border-b border-slate-200/80 px-2 pb-3 dark:border-slate-700/70">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500 dark:text-slate-400">Notifikasi</p>
                    <p class="mt-1 text-sm font-semibold text-slate-900 dark:text-slate-100">Pembaruan SafeFood</p>
                </div>
                <button
                    type="button"
                    class="rounded-full bg-teal-100 px-3 py-1 text-xs font-semibold text-teal-700 transition hover:bg-teal-200 disabled:cursor-not-allowed disabled:opacity-50 dark:bg-teal-500/15 dark:text-teal-300 dark:hover:bg-teal-500/25"
                    @click="markAllAsRead()"
                    :disabled="unreadCount === 0 || loadingAction"
                >
                    Tandai semua
                </button>
            </div>

            <div class="mt-3">
                <template x-if="loading && !loaded">
                    <div class="space-y-3 p-2">
                        <template x-for="i in 4" :key="`skeleton-${i}`">
                            <div class="rounded-2xl border border-slate-200/70 bg-white/80 p-3 dark:border-slate-700/70 dark:bg-slate-900/60">
                                <div class="h-3 w-28 animate-pulse rounded bg-slate-200 dark:bg-slate-700"></div>
                                <div class="mt-2 h-3 w-full animate-pulse rounded bg-slate-200 dark:bg-slate-700"></div>
                                <div class="mt-2 h-3 w-4/5 animate-pulse rounded bg-slate-200 dark:bg-slate-700"></div>
                            </div>
                        </template>
                    </div>
                </template>

                <template x-if="!loading && notifications.length === 0">
                    <div class="p-3 text-center">
                        <p class="text-sm font-medium text-slate-700 dark:text-slate-200">Belum ada notifikasi.</p>
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Pembaruan terbaru akan muncul di sini.</p>
                    </div>
                </template>

                <template x-if="!loading && notifications.length > 0">
                    <div class="max-h-80 space-y-4 overflow-y-auto p-2">
                        <template x-for="group in groupedNotifications" :key="group.key">
                            <section x-show="group.items.length > 0">
                                <p class="px-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400" x-text="group.label"></p>
                                <div class="mt-2 space-y-2">
                                    <template x-for="item in group.items" :key="item.id">
                                        <button
                                            type="button"
                                            @click="handleNotificationClick(item)"
                                            class="relative flex w-full items-start gap-3 rounded-2xl border p-3 text-left transition duration-200"
                                            :class="notificationCardClass(item)"
                                        >
                                            <span class="mt-0.5 inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-xl border" :class="iconWrapperClass(item)" x-html="iconSvg(item)"></span>
                                            <span class="min-w-0 flex-1">
                                                <span class="flex items-start justify-between gap-3">
                                                    <span class="truncate text-sm font-semibold" :class="item.is_unread ? 'text-slate-900 dark:text-slate-100' : 'text-slate-700 dark:text-slate-300'" x-text="item.title"></span>
                                                    <span class="whitespace-nowrap text-[11px] text-slate-500 dark:text-slate-400" x-text="relativeTime(item.created_at)"></span>
                                                </span>
                                                <span class="mt-1 block text-xs leading-5 text-slate-600 dark:text-slate-400" x-text="item.message"></span>
                                            </span>
                                            <span
                                                x-show="isUrgent(item)"
                                                x-cloak
                                                class="absolute right-2 top-2 h-2 w-2 rounded-full bg-red-400/90 animate-pulse"
                                            ></span>
                                        </button>
                                    </template>
                                </div>
                            </section>
                        </template>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <div
        x-show="toast.visible"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-6"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-6"
        class="fixed bottom-5 right-5 z-[80] w-[20rem] max-w-[92vw] rounded-2xl border border-emerald-300/60 bg-white/95 p-4 shadow-[0_18px_50px_rgba(16,185,129,0.22)] backdrop-blur dark:border-emerald-500/35 dark:bg-slate-900/95"
    >
        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700 dark:text-emerald-300">Notifikasi Baru</p>
        <p class="mt-2 text-sm font-semibold text-slate-900 dark:text-slate-100" x-text="toast.message"></p>
    </div>
</div>

@once
    @push('scripts')
        <script>
            window.safefoodNotificationBell = function () {
                return {
                    open: false,
                    loading: false,
                    loadingAction: false,
                    loaded: false,
                    notifications: [],
                    groupedNotifications: [
                        { key: 'today', label: 'Hari Ini', items: [] },
                        { key: 'yesterday', label: 'Kemarin', items: [] },
                        { key: 'older', label: 'Lebih Lama', items: [] },
                    ],
                    unreadCount: 0,
                    latestUnreadId: null,
                    pollTimer: null,
                    pollingEnabled: false,
                    isDashboardPage: window.location.pathname === '/dashboard',
                    toast: {
                        visible: false,
                        message: '',
                        timer: null,
                    },
                    csrfToken: document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '',

                    init() {
                        this.$watch('open', (isOpen) => {
                            if (isOpen) {
                                this.fetchUnreadNotifications({ includeList: true, initial: !this.loaded });
                                this.startNotificationPolling();
                                return;
                            }

                            if (!this.isDashboardPage) {
                                this.stopNotificationPolling();
                            }
                        });

                        document.addEventListener('visibilitychange', () => {
                            if (document.visibilityState === 'visible') {
                                if (this.pollingEnabled) {
                                    this.startNotificationPolling();
                                }
                                return;
                            }

                            this.stopNotificationPolling();
                        });

                        window.addEventListener('beforeunload', () => {
                            this.stopNotificationPolling();
                        }, { once: true });

                        if (this.isDashboardPage) {
                            this.fetchUnreadNotifications({ initial: true });
                            this.startNotificationPolling();
                        }
                    },

                    toggleDropdown() {
                        this.open = !this.open;

                        if (this.open && !this.loaded) {
                            this.loading = true;
                        }
                    },

                    badgeCount() {
                        return this.unreadCount > 99 ? '99+' : String(this.unreadCount);
                    },

                    isUrgent(item) {
                        return item.priority === 'urgent' || (item.type_key ?? '').includes('urgent');
                    },

                    notificationCardClass(item) {
                        if (this.isUrgent(item)) {
                            return item.is_unread
                                ? 'border-red-300 bg-red-50/70 dark:border-red-500/50 dark:bg-red-500/12'
                                : 'border-red-200/80 bg-red-50/40 dark:border-red-500/35 dark:bg-red-500/8';
                        }

                        return item.is_unread
                            ? 'border-emerald-300/70 bg-emerald-50/70 dark:border-emerald-500/45 dark:bg-emerald-500/12'
                            : 'border-slate-200/80 bg-white/75 dark:border-slate-700/70 dark:bg-slate-900/65';
                    },

                    iconWrapperClass(item) {
                        if (this.isUrgent(item)) {
                            return 'border-red-300/70 bg-red-100/70 text-red-700 dark:border-red-500/45 dark:bg-red-500/20 dark:text-red-300';
                        }

                        return item.is_unread
                            ? 'border-emerald-300/70 bg-emerald-100/70 text-emerald-700 dark:border-emerald-500/45 dark:bg-emerald-500/20 dark:text-emerald-300'
                            : 'border-slate-200/80 bg-slate-100/70 text-slate-600 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300';
                    },

                    iconSvg(item) {
                        if (this.isUrgent(item)) {
                            return `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 4h.01M5.06 19h13.88c1.54 0 2.5-1.67 1.73-3L13.73 4a2 2 0 00-3.46 0L3.33 16c-.77 1.33.19 3 1.73 3z"/></svg>`;
                        }

                        const type = (item.type_key ?? '').toLowerCase();

                        if (type.includes('article') || type.includes('tip')) {
                            return `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 5a2 2 0 012-2h10a2 2 0 012 2v14l-5-3-5 3V5z"/></svg>`;
                        }

                        if (type.includes('quiz') || type.includes('check')) {
                            return `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>`;
                        }

                        return `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 11-6 0m6 0H9"/></svg>`;
                    },

                    startNotificationPolling() {
                        this.pollingEnabled = true;

                        if (document.visibilityState !== 'visible' || this.pollTimer) {
                            return;
                        }

                        this.pollTimer = window.setInterval(() => {
                            this.fetchUnreadNotifications();
                        }, 20000);
                    },

                    stopNotificationPolling() {
                        if (this.pollTimer) {
                            clearInterval(this.pollTimer);
                            this.pollTimer = null;
                        }
                    },

                    async fetchUnreadNotifications({ includeList = false, initial = false } = {}) {
                        try {
                            const response = await fetch('/api/notifications/unread-count', {
                                method: 'GET',
                                credentials: 'same-origin',
                                headers: {
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest',
                                },
                            });

                            if (!response.ok) {
                                return;
                            }

                            const payload = await response.json();
                            const previousCount = this.unreadCount;
                            const previousLatestId = this.latestUnreadId;

                            this.unreadCount = Number(payload.unread_count ?? 0);
                            this.latestUnreadId = payload.latest_unread_id ?? null;

                            if (!initial && this.unreadCount > previousCount && this.latestUnreadId && this.latestUnreadId !== previousLatestId) {
                                this.showToast(payload.latest_unread_title ?? 'Tips keamanan pangan baru tersedia!');
                            }

                            if (includeList || this.open) {
                                await this.fetchNotifications();
                            }
                        } catch (error) {
                            console.error('SafeFood notification polling failed:', error);
                        }
                    },

                    async fetchNotifications() {
                        this.loading = true;

                        try {
                            const response = await fetch('/api/notifications', {
                                method: 'GET',
                                credentials: 'same-origin',
                                headers: {
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest',
                                },
                            });

                            if (!response.ok) {
                                this.notifications = [];
                                this.groupByDate();
                                this.loaded = true;
                                return;
                            }

                            const payload = await response.json();
                            this.notifications = Array.isArray(payload.data) ? payload.data : [];
                            this.groupByDate();
                            this.loaded = true;
                        } catch (error) {
                            this.notifications = [];
                            this.groupByDate();
                            this.loaded = true;
                            console.error('SafeFood notifications fetch failed:', error);
                        } finally {
                            this.loading = false;
                        }
                    },

                    async markAllAsRead() {
                        if (this.loadingAction || this.unreadCount === 0) {
                            return;
                        }

                        this.loadingAction = true;

                        try {
                            const response = await fetch('/api/notifications/mark-all-read', {
                                method: 'POST',
                                credentials: 'same-origin',
                                headers: {
                                    'Accept': 'application/json',
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': this.csrfToken,
                                    'X-Requested-With': 'XMLHttpRequest',
                                },
                                body: JSON.stringify({}),
                            });

                            if (!response.ok) {
                                return;
                            }

                            this.notifications = this.notifications.map((item) => ({
                                ...item,
                                is_unread: false,
                            }));
                            this.unreadCount = 0;
                            this.latestUnreadId = null;
                            this.groupByDate();
                        } catch (error) {
                            console.error('SafeFood mark-all-read failed:', error);
                        } finally {
                            this.loadingAction = false;
                        }
                    },

                    async markAsRead(id) {
                        const response = await fetch(`/api/notifications/${id}/read`, {
                            method: 'POST',
                            credentials: 'same-origin',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': this.csrfToken,
                                'X-Requested-With': 'XMLHttpRequest',
                            },
                            body: JSON.stringify({}),
                        });

                        if (!response.ok) {
                            return false;
                        }

                        this.notifications = this.notifications.map((item) => item.id === id
                            ? { ...item, is_unread: false }
                            : item);

                        this.unreadCount = Math.max(0, this.unreadCount - 1);
                        this.groupByDate();

                        return true;
                    },

                    async handleNotificationClick(item) {
                        if (item.is_unread) {
                            await this.markAsRead(item.id);
                        }

                        if (item.url) {
                            window.location.href = item.url;
                        }
                    },

                    groupByDate() {
                        const grouped = [
                            { key: 'today', label: 'Hari Ini', items: [] },
                            { key: 'yesterday', label: 'Kemarin', items: [] },
                            { key: 'older', label: 'Lebih Lama', items: [] },
                        ];

                        const now = new Date();
                        const startToday = new Date(now.getFullYear(), now.getMonth(), now.getDate());
                        const startYesterday = new Date(startToday);
                        startYesterday.setDate(startYesterday.getDate() - 1);

                        this.notifications.forEach((item) => {
                            const createdAt = new Date(item.created_at);

                            if (createdAt >= startToday) {
                                grouped[0].items.push(item);
                                return;
                            }

                            if (createdAt >= startYesterday) {
                                grouped[1].items.push(item);
                                return;
                            }

                            grouped[2].items.push(item);
                        });

                        this.groupedNotifications = grouped;
                    },

                    relativeTime(isoString) {
                        const createdAt = new Date(isoString).getTime();
                        const now = Date.now();
                        const diff = Math.max(0, Math.floor((now - createdAt) / 1000));

                        if (diff < 60) {
                            return 'Baru saja';
                        }

                        const minutes = Math.floor(diff / 60);
                        if (minutes < 60) {
                            return `${minutes} menit lalu`;
                        }

                        const hours = Math.floor(minutes / 60);
                        if (hours < 24) {
                            return `${hours} jam lalu`;
                        }

                        const days = Math.floor(hours / 24);
                        return `${days} hari lalu`;
                    },

                    showToast(message) {
                        this.toast.message = message;
                        this.toast.visible = true;

                        if (this.toast.timer) {
                            clearTimeout(this.toast.timer);
                        }

                        this.toast.timer = setTimeout(() => {
                            this.toast.visible = false;
                        }, 3500);
                    },
                };
            };
        </script>
    @endpush
@endonce

<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    Inertia.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    Inertia.post(route('logout'));
};
</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <div class="min-h-screen bg-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl px-4 sm:px-0">
                <div class="flex justify-between h-16">
                    <div class="hidden sm:flex">
                        
                        <div class="fixed flex flex-col h-screen p-3 bg-white shadow w-60">
                            <div class="space-y-3">
                                <div class="mt-12 items-center">
                                    <div class="shrink-0 items-center">
                                        <div class="ml-20">
                                            
                                        <Link :href="route('profile.show')">
                                            <ApplicationMark class="block h-9 w-auto" />
                                        </Link>
                                        </div>
                                        
                                        <div class="mt-4 ml-10">
                                            <Link :href="route('profile.show')">
                                                {{ $page.props.user.name }}
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 !mt-14">
                                    <ul class="pt-2 pb-4 space-y-1 text-sm">
                                        <li class="rounded-sm">
                                            <!-- Navigation Links -->
                                            <div class="hidden space-x-8 sm:ml-3 sm:flex">
                                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                                    <div
                                                        class="flex pr-20 py-2 space-x-3 rounded-md"
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke-width="1.5"
                                                            stroke="currentColor"
                                                            class="w-6 h-6"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                                                            />
                                                        </svg>

                                                        <span class="mt-1">Beranda</span>
                                                    </div>
                                                </NavLink>
                                            </div>
                                        </li>
                                        <li class="rounded-sm">
                                            <NavLink
                                                :href="route('url-sales.index')" :active="route().current('url-sales.index')"
                                                >
                                                <div class="w-44 flex pr-12 py-2 space-x-3 rounded-md">
                                                    <span class="mt-1">BGB</span>
                                                </div>
                                            </NavLink>
                                        </li>

                                        <!-- <li class="rounded-sm my-3">
                                            <NavLink :href="route('url-sales.index')" :active="route().current('url-sales.index')">
                                                <div class="flex pr-10 py-2 space-x-3 rounded-md">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="w-6 h-6"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z"
                                                        />
                                                    </svg>

                                                    <span>URL From Sales</span>
                                                </div>
                                            </NavLink>
                                        </li> -->
                                        <li class="rounded-sm mb-3">
                                            <NavLink  :href="route('logactivity.index')" :active="route().current('logactivity.index')">
                                                <div class="flex pr-10 py-2 space-x-3 rounded-md">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="w-6 h-6"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
                                                        />
                                                    </svg>

                                                    <span class="mt-1">Log Activity</span>
                                                </div>
                                            </NavLink>
                                        </li>
                                        <li class="rounded-sm mb-3 ">
                                            <NavLink :href="route('katalog.index')" :active="route().current('katalog.index')">
                                                <div class="flex pr-10 py-2 space-x-3 rounded-md">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="w-6 h-6"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
                                                        />
                                                    </svg>

                                                    <span class="mt-1">Katalog</span>
                                                </div>
                                            </NavLink>
                                        </li>
                                        <li class="rounded-sm">
                                            <NavLink>
                                                <!-- Authentication -->
                                                <form @submit.prevent="logout" class="flex items-center py-2 pl-1 space-x-3 rounded-md">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="w-6 h-6"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"
                                                        />
                                                    </svg>
                                                    
                                                    <DropdownLink as="button">
                                                        Log Out
                                                    </DropdownLink>
                                                </form>
                                            </NavLink>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Logo -->
                    </div>
                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition" @click="showingNavigationDropdown = ! showingNavigationDropdown">
                            <svg
                                class="h-6 w-6"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        <div v-if="$page.props.jetstream.managesProfilePhotos" class="shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name">
                        </div>

                        <div>
                            <div class="font-medium text-base text-gray-800">
                                {{ $page.props.user.name }}
                            </div>
                            <div class="font-medium text-sm text-gray-500">
                                {{ $page.props.user.email }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <ResponsiveNavLink :href="route('profile.show')" :active="route().current('profile.show')">
                            Profile
                        </ResponsiveNavLink>

                        <ResponsiveNavLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')" :active="route().current('api-tokens.index')">
                            API Tokens
                        </ResponsiveNavLink>
                    </div>
                </div>

                <div class="pt-2 pb-3 space-y-1">
                    <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                        Sales
                    </ResponsiveNavLink>
                    <ResponsiveNavLink>
                        URL From Sales
                    </ResponsiveNavLink>
                    <ResponsiveNavLink>
                        Log Activity
                    </ResponsiveNavLink>
                    <ResponsiveNavLink>
                        Katalog
                    </ResponsiveNavLink>
                    <!-- Authentication -->
                    <form method="POST" @submit.prevent="logout">
                        <ResponsiveNavLink as="button">
                            Log Out
                        </ResponsiveNavLink>
                    </form>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="mt-3 space-y-1">
                        <!-- Team Management -->
                        <!-- <template v-if="$page.props.jetstream.hasTeamFeatures">
                            <div class="border-t border-gray-200" />

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Manage Team
                            </div>

                                Team Settings
                            <ResponsiveNavLink :href="route('teams.show', $page.props.user.current_team)" :active="route().current('teams.show')">
                                Team Settings
                            </ResponsiveNavLink>

                            <ResponsiveNavLink v-if="$page.props.jetstream.canCreateTeams" :href="route('teams.create')" :active="route().current('teams.create')">
                                Create New Team
                            </ResponsiveNavLink>

                            <div class="border-t border-gray-200" />

                                Team Switcher
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Switch Teams
                            </div>

                            <template v-for="team in $page.props.user.all_teams" :key="team.id">
                                <form @submit.prevent="switchToTeam(team)">
                                    <ResponsiveNavLink as="button">
                                        <div class="flex items-center">
                                            <svg v-if="team.id == $page.props.user.current_team_id" class="mr-2 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <div>{{ team.name }}</div>
                                        </div>
                                    </ResponsiveNavLink>
                                </form>
                            </template> 
                        </template>-->
                    </div>
                </div>
            </div>

            <!-- Page Heading -->
            <!-- <header v-if="$slots.header" class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header> -->

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        show: false,
      };
    },
  };
</script>
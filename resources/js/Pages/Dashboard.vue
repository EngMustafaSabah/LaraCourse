<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Home Page
            </h2>
        </template>

        <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-4 max-w-xs">
                <input v-model="params.search" aria-label="Search" type="search"   placeholder="Search..." class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
            </div>

            <div class="overflow-hidden bg-white shadow-md sm:rounded-lg">
            <div class="flex flex-col">
                <div class="overflow-x-auto -my-2 sm:-mx-6 lg:-mx-8">
                <div class="inline-block py-2 min-w-full align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                        <div class="overflow-hidden border-b py-2 min-w-full align-middle " v-for="(course,index) in courses.data" :key="index" > {{course.name}} {{course.description}} </div>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <pagination class="mt-10" :links="courses.links"/>
        </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    // import Welcome from '@/Jetstream/Welcome'
    import Pagination from '../Jetstream/Pagination';
    import { pickBy, throttle } from 'lodash';

    export default {
        components: {
            AppLayout,
            // Welcome,
            Pagination,

        },

        props: {
            courses: Object,
            filters: Object,
        },
        data() {
            return {
                params: {
                    search: this.filters.search,
                    field: this.filters.field,
                    direction: this.filters.direction,
                },
            };
        },
        methods: {
            sort(field) {
                this.params.field = field;
                this.params.direction = this.params.direction === 'asc' ? 'desc' : 'asc';
            }
        },
        watch: {
            params: {
                handler: throttle(function () {
                    let params = pickBy(this.params);
                    this.$inertia.get(this.route('dashboard'), params, { replace: true, preserveState: true });
                }, 150),
                deep: true,
            },
        },
    };
</script>

<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Courses
            </h2>
        </template>

        <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-4 max-w-xs">
                <input v-model="params.search" aria-label="Search" type="search"   placeholder="Search..." class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
            </div>
            <div class="mb-4 max-w-xs">                 
                <a :href="route('addCourse')" class="bg-transparent hover:bg-blue text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded"> Add Course</a>
            </div>

            <div class="overflow-hidden bg-white shadow-md sm:rounded-lg">
            <div class="flex flex-col">
                <div class="overflow-x-auto -my-2 sm:-mx-6 lg:-mx-8">
                <div class="inline-block py-2 min-w-full align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-indigo-500">
                        <tr>
                        <th scope="col" class="w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase">
                            <span @click="sort('name')" class="inline-flex py-3 px-6 w-full justify-between" >Name
                            <svg v-if="params.field === 'name' && params.direction === 'asc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"/>
                            </svg>
                            <svg v-if="params.field === 'name' && params.direction === 'desc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"/>
                            </svg>
                            </span>
                        </th>
                        <th scope="col" class="w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase">
                            <span @click="sort('description')" class="inline-flex py-3 px-6 w-full justify-between" >Description
                            <svg  v-if="params.field === 'description' && params.direction === 'asc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"/>
                            </svg>
                            <svg v-if="params.field === 'description' && params.direction === 'desc'"  xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"/>
                            </svg>
                            </span>
                        </th>
                        <th scope="col" class="w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase">
                            <span @click="sort('levels')" class="inline-flex py-3 px-6 w-full justify-between" >Levels
                            <svg  v-if="params.field === 'description' && params.direction === 'asc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"/>
                            </svg>
                            <svg v-if="params.field === 'levels' && params.direction === 'desc'"  xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"/>
                            </svg>
                            </span>
                        </th>
                        <th scope="col" class="py-3 px-6 w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase">
                            hours
                        </th>
                        <th scope="col" class="py-3 px-6 w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase">
                            views
                        </th>
                        <th scope="col" class="py-3 px-6 w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase">
                            Action
                        </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200"> 
                        <!-- v-for="(course, index) in courses.data" :key="course.id" -->
                        <tr v-for="(course,index) in courses.data" :key="index" >
                        <td class="py-4 px-6 whitespace-nowrap">
                            <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <!-- <img class="w-10 h-10 rounded-full" :src="course.profile_photo_url" alt=""/> -->
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-semibold text-gray-900">
                                {{ course.name }}
                                </div>
                            </div>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                            {{ course.description }}
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                            {{ course.levels }}
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                            {{ course.hours }}
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                            {{ course.views }}
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                        <!-- <form form @submit.prevent="submit">
                            <button type="submit" 
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm 
                            text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 
                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                delete
                            </button>
                        </form> -->
                        <button @click="deleteRow(course.id)" 
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2
                        px-4 rounded">Delete</button>
                        </td>
                        </tr>
                        </tbody>
                    </table>
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
    import Pagination from '../Jetstream/Pagination';
    import { pickBy, throttle } from 'lodash';

    export default {
    components: {
        AppLayout,
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
        },
        deleteRow: function (data) {
            if (!confirm('Are you sure want to remove?')) return;
            this.$inertia.post(`/delCourse/${data}/destroy`, data)
        }
    },
    watch: {
        params: {
            handler: throttle(function () {
                let params = pickBy(this.params);
                this.$inertia.get(this.route('courses'), params, { replace: true, preserveState: true });
            }, 150),
            deep: true,
        },
    },
};
</script>

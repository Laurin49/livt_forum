<script setup>
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/20/solid'
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    'meta': {
        type: Object,
        required: true
    }
});

// first and last item in links are previous and next links
const previousUrl = computed(() => props.meta.links.shift().url);
const nextUrl = computed(() => props.meta.links.pop().url);
</script>

<template>
    <div class="flex items-center justify-between border-t border-gray-200 px-4 py-3 sm:px-6">
        <!-- Responsive Navigtion -->
        <div class="flex flex-1 justify-between sm:hidden">
            <Link :href="previousUrl ?? ''" as="button"
                class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
            Previous</Link>
            <Link :href="nextUrl ?? ''" as="button"
                class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
            Next</Link>
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    {{ ' ' }}
                    <span class="font-medium">{{ meta.from }}</span>
                    {{ ' ' }}
                    to
                    {{ ' ' }}
                    <span class="font-medium">{{ meta.to }}</span>
                    {{ ' ' }}
                    of
                    {{ ' ' }}
                    <span class="font-medium">{{ meta.total }}</span>
                    {{ ' ' }}
                </p>
            </div>
            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm bg-white" aria-label="Pagination">
                    <Link :href="previousUrl ?? ''"
                        class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Previous</span>
                    <ChevronLeftIcon class="h-5 w-5" aria-hidden="true" />
                    </Link>
                    <Link v-for="link in meta.links" :href="link.url ?? ''" v-html="link.label"
                        class="relative inline-flex items-center first-of-type:rounded-l-md last-of-type:rounded-r-md px-3 py-2"
                        :class="{
                            'z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600': link.active,
                            'text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0': !link.active
                        }">
                    </Link>
                    <Link :href="nextUrl ?? ''"
                        class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Next</span>
                    <ChevronRightIcon class="h-5 w-5" aria-hidden="true" />
                    </Link>
                </nav>
            </div>
        </div>
    </div>
</template>

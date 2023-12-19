<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import { ref } from 'vue'

const props = defineProps({
    grades: Object,
    courses: Object,
});
const filterForm = useForm({
    course: null,
});
const questionForm = useForm({
    course: '',
    question: '',
});
const showSuccessMessage = ref(false);
const submitQuestion = () => {
    questionForm.post(route('question.store'), {
        onSuccess: () => {
            questionForm.reset('question', 'course');
            filterForm.reset('course');
            showSuccessMessage.value = true;
        },
    });
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Grades</h2>
        </div>

        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 max-w-md bg-white shadow-sm sm:rounded-lg">
                    <form @submit.prevent="filterForm.post('/', { only: ['grades'] })">
                        <div class="flex items-center gap-x-3">
                            <select id="course_filter" v-model="filterForm.course" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="all">All courses</option>
                                <template v-for="course in courses">
                                    <option :value="course.id">{{ course.name }}</option>
                                </template>
                            </select>
                            <SecondaryButton class="ms-4" :class="{ 'opacity-25': filterForm.processing }" :disabled="filterForm.processing" :type="'submit'">
                                Filter
                            </SecondaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="pb-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="w-full whitespace-nowrap">
                        <tr class="text-left font-bold">
                            <th class="pb-4 pt-6 px-6">Course Name</th>
                            <th class="pb-4 pt-6 px-6">Professor Name</th>
                            <th class="pb-4 pt-6 px-6">Grade</th>
                        </tr>
                        <tr v-for="grade in grades" :key="grade.id">
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4 focus:text-indigo-500">
                                    {{ grade.course.name }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4 focus:text-indigo-500">
                                    {{ grade.course.professor.name }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4 focus:text-indigo-500">
                                    {{ grade.grade }}
                                </div>
                            </td>
                        </tr>
                        <tr v-if="grades.length === 0">
                            <td class="px-6 py-4 border-t" colspan="4">No grades found.</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ask your professor a question</h2>
        </div>
        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 bg-white shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submitQuestion">
                        <div class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <InputLabel for="course" value="Select professor and course for your question" class="block text-sm font-medium leading-6 text-gray-900" />
                                <div class="mt-2">
                                    <select id="course" v-model="questionForm.course" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                        <template v-for="course in courses">
                                            <option :value="course.id">{{ course.professor }} ({{ course.name }})</option>
                                        </template>
                                    </select>
                                </div>
                                <InputError class="mt-2" :message="questionForm.errors.course" />
                            </div>
                            <div class="col-span-full pb-3">
                                <InputLabel for="question" value="Question" class="block text-sm font-medium leading-6 text-gray-900" />
                                <div class="mt-2">
                                    <textarea id="question" v-model="questionForm.question" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" maxlength="255"></textarea>
                                </div>
                                <InputError class="mt-2" :message="questionForm.errors.question" />
                            </div>
                        </div>
                        <div class="mt-6 flex items-center gap-x-6">
                            <SecondaryButton :class="{ 'opacity-25': questionForm.processing }" :disabled="questionForm.processing" :type="'submit'">
                                Submit
                            </SecondaryButton>
                        </div>
                    </form>
                </div>
                <div  v-if="showSuccessMessage" class="flex justify-between p-4 mt-4 shadow-sm sm:rounded-lg bg-green-300">
                    <div>
                        Question submitted successfully!
                    </div>
                    <button @click="showSuccessMessage = false">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

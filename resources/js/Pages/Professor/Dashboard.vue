<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import EditGrade from "@/Pages/Professor/EditGrade.vue";
import {ref} from "vue";

const props = defineProps({
    questions: Object,
    courses: Object,
});
const editGrade = ref(false);
const modalData = ref({
    gradeId: '',
    grade: '',
    studentName: '',
    courseName: '',
});
const editGradeModal = (gradeId, grade, studentName, courseName) => {
    editGrade.value = true;
    modalData.value.gradeId = gradeId;
    modalData.value.grade = grade;
    modalData.value.studentName = studentName;
    modalData.value.courseName = courseName;
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Grades</h2>
        </div>
        <div class="pb-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="w-full whitespace-nowrap">
                        <tr class="text-left font-bold">
                            <th class="pb-4 pt-6 px-6">Course Name</th>
                            <th class="pb-4 pt-6 px-6">Student Name</th>
                            <th class="pb-4 pt-6 px-6">Grade</th>
                            <th></th>
                        </tr>
                        <tr v-for="course in courses" :key="course.id">
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4 focus:text-indigo-500">
                                    {{ course.courseName }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4 focus:text-indigo-500">
                                    {{ course.studentName }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4 focus:text-indigo-500">
                                    {{ course.grade }}
                                </div>
                            </td>
                            <td class="border-t">
                                <button @click="editGradeModal(course.id,course.grade,course.studentName,course.courseName)">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <tr v-if="courses.length === 0">
                            <td class="px-6 py-4 border-t" colspan="4">No grades found.</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Questions from students</h2>
        </div>
        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 bg-white shadow-sm sm:rounded-lg">
                    <table class="w-full whitespace-nowrap">
                        <tr class="text-left font-bold">
                            <th class="pb-4 pt-6 px-6">Course Name</th>
                            <th class="pb-4 pt-6 px-6">Student Name</th>
                            <th class="pb-4 pt-6 px-6">Student Email</th>
                            <th class="pb-4 pt-6 px-6">Question</th>
                            <th class="pb-4 pt-6 px-6">Date</th>
                        </tr>
                        <tr v-for="question in questions" :key="question.id">
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4 focus:text-indigo-500">
                                    {{ question.courseName }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4 focus:text-indigo-500">
                                    {{ question.fromUser }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4 focus:text-indigo-500">
                                    {{ question.fromUserEmail }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4 focus:text-indigo-500">
                                    {{ question.question }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4 focus:text-indigo-500">
                                    {{ question.createdAt }}
                                </div>
                            </td>
                        </tr>
                        <tr v-if="questions.length === 0">
                            <td class="px-6 py-4 border-t" colspan="4">No questions found.</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
    <EditGrade
        :show="editGrade"
        :gradeId="modalData.gradeId"
        :grade="modalData.grade"
        :studentName="modalData.studentName"
        :courseName="modalData.courseName" />
</template>

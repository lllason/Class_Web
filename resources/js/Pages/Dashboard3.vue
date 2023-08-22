<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<style>
  .blue-border {
    border: 1px solid blue;
  }
</style>
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <center><h3 class="font-semibold text-xl text-gray-800 leading-tight">AI應用工程師班第 01期</h3></center>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2><b>訓練職類</b></h2>
                        <div class="blue-border"></div>
                        電腦系統設計及分析
                        <br><br>
                        <h2><b>訓練緣由</b></h2>
                        <div class="blue-border"></div>
                        根據緯育進行AI相關職缺調查，分析近3年依區域別需求職缺變化，<br>
                        2020-2021年進入Q4在人工智慧相關職缺的需求是明顯縮減的，而2022年Q3進入Q4需求卻是逆勢增加，<br>
                        分區比較下，其中以雙北、基隆、宜蘭地區對AI人才的需求增加幅度最高，成長近77%。 <br>
                        2022年Hive Ventures《臺灣企業AI趨勢報告》調查270家大中小型企業AI科技導入現況，近6成企業受2021年疫情影響而感受到導入AI的急迫性，<br>
                        其中以網路與媒體產業和疫情前線的醫療保健產業者的企業較大宗。而隨著投資AI的需求增長，約45%企業錄用年資不到1年的大量新手資料科學家。<br>                   
                        <br>

                        <h2><b>課程目標</b></h2>
                        <div class="blue-border"></div>
                        1. 會運用Python進行資料收集、網路爬蟲、資料清理、數據分析。 <br>
                        2. 會運用Python矩陣計算與資料處理相關模組的能力，如 Numpy、 Pandas、Scipy等。 <br>
                        3. 會使用Tableau或相關軟體進行數據視覺化的能力。 <br>
                        4. 學習LINE Bot部署、基礎概念與開發實戰，作為基礎前端的能力之一。並於日後可利用LINE Bot作為簡易的AI串接工具。 <br>
                        5. 了解Regression、Classification、Clustering 相關演算法原理。 <br>
                        6. 會用Scikit-learn 進行如Logistic Regression、SVM、Decision Tree等Machine Learning 的實作。 <br>
                        7. 會用Keras-TensorFlow 進行DNN、CNN、RNN實作。 <br>
                        8. 掌握機器學習與深度學習的演算法後，能套用在資料探勘、電腦視覺等技術領域上。 <br>
                        9. 運用Python程式語言與資料庫結合，製作資料庫應用程式，譬如會員系統和文章搜尋系統等。 <br>
                        10. 使用OpenCV進行電腦影像處理，如邊緣偵測、白平衡、模糊化、銳利化和二值化等等。 <br>
                        11. 提供雲端憑證讓學員AI雲端部署課程，將AI技術透過雲端實現運算與資料處理，亦可同時實作本地AI模型製作圖像劇情機器人及雲端AI模型製作引導型機器人。 <br>
                        12. 了解資料視覺化基本知識，實作專題時，能完成更具商業概念與規劃的作品。 <br>
                        13. 了解微軟Azure AZ-900基礎雲端入門實務與服務、AI-900人工智慧雲端服務與認證內容。 <br>
                        14. 完成專案開發個人實作與團體合作之能力。<br>
                        <br>

                        <h2><b>就業展望</b></h2>
                        <div class="blue-border"></div>
                        數據分析師、爬蟲開發工程師、資料工程師、資料科學家、人工智慧軟體應用工程師、科技業產品經理、AI演算法應用工程師、AI演算法工程師、影像辨識工程師等。
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>

import axios from 'axios';
import { onMounted, ref } from 'vue'
import Button from '../Components/Button.vue'
import Github from '../Components/Github.vue'
import Twitter from '../Components/Twitter.vue'

const quote = ref(0)
const url = ref(0)

onMounted(() => {
    getRandomQuote()
    url.value = window.location.origin
})

const getRandomQuote = () => {

    axios.get('/api/getQuote')
        .then(function (response) {
            quote.value = response.data
            setTweetLink()
        })
        .catch(function (error) {

        })
}

const setTweetLink = () => {

    let baseUrl = "https://twitter.com/intent/tweet?text="

    let tweetLink = document.getElementById("tweetLink")

    tweetLink.setAttribute("href", baseUrl + quote.value.quote + "%0A%0A" + "- " + quote.value.author)

}

</script>

<template>
    
    <div class="min-h-screen px-5 md:px-0 background">

        <!-- Title -->
        <div class="flex justify-center pt-12">

             <h1 class="text-4xl font-bold text-gray-800">Rick Rest</h1>

        </div>

        <!-- Description -->
        <div class="max-w-2xl mx-auto mt-5 text-center">

            <p class="text-2xl font-bold text-gray-800">A free rest api for random Rick and Morty quotes</p>

        </div>

        <!-- Controls -->
        <div class="max-w-2xl mx-auto mt-10">

            <div class="items-center md:justify-between md:flex">
                
                <a href="/api/getQuote" class="flex items-center px-3 py-2 bg-white rounded-md">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                    </svg>

                    <span class="ml-1 text-sm font-extrabold uppercase">Get</span>
                    
                    <span class="ml-1 text-xs md:text-sm">{{ url + '/api/getQuote'}}</span>
                    
                </a>

                <div class="flex justify-center mt-5 space-x-2 md:justify-start md:mt-0">

                    <a id="tweetLink" class="flex items-center px-4 py-2 text-xs font-semibold text-white uppercase bg-blue-400 rounded-md hover:bg-blue-500" data-size="large" target="_blank">
                        <Twitter class="w-5 h-5" />
                        <span class="ml-1">Tweet</span>
                    </a>

                    <Button @click="getRandomQuote()">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                    </svg>

                    <span class="ml-1">Refresh</span>
                    
                    </Button>

                </div>
               
            </div>

            <!-- Quote Container -->
            <div class="p-6 mt-5 shadow-2xl bg-gradient-to-l from-lime-400 to-indigo-600 rounded-3xl shadow-lime-400/50">

                <div class="w-full px-12 py-6 bg-white shadow-2xl rounded-xl shadow-lime-400/50">
                    
                    <!-- Quote -->
                    <div class="flex text-xl italic font-semibold sm:text-2xl">"{{ quote.quote }}"</div>

                    <!-- Author -->
                    <div class="flex justify-end w-full mt-5 tracking-wider text-gray-500 sm:text-lg">- {{ quote.author }}</div>

                     <!-- Meta -->
                    <div class="flex mt-5 text-gray-500">
                        <div class="text-sm">Season {{ quote.season}} | Episode {{ quote.episodeNumber}} - {{ quote.episodeTitle }}</div>
                    </div>
                    
                </div>
                
            </div>

            <!-- Social -->
            <div class="flex justify-center mt-5 space-x-2">

               <a href="https://github.com/deemonic/rick-rest" class="flex items-center px-4 py-2 text-xs font-semibold text-white uppercase bg-gray-800 rounded-md hover:bg-gray-900" data-size="large" target="_blank">
                    <Github class="w-5 h-5 text-white" />
                    <span class="ml-1">Star</span>
                </a>

                <a href="https://twitter.com/DeemonicDude" class="flex items-center px-4 py-2 text-xs font-semibold text-white uppercase bg-blue-400 rounded-md hover:bg-blue-500" data-size="large" target="_blank">
                    <Twitter class="w-5 h-5" />
                    <span class="ml-1">@DeemonicDude</span>
                </a>

            </div>

            <div class="flex justify-center pb-12 mt-5">
                <a href="https://www.digitalocean.com/?refcode=27d9b5b97544&utm_campaign=Referral_Invite&utm_medium=Referral_Program&utm_source=badge"><img src="https://web-platforms.sfo2.digitaloceanspaces.com/WWW/Badge%203.svg" alt="DigitalOcean Referral Badge" /></a>
            </div>

        </div>
       
    </div>
   
</template>

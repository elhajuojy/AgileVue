<template>
 <footer class="my-6">
    <div class="container text-grey-darken-2 mx-auto px-6">
        <div class="mt-16 border-t-2 border-gray-300 flex flex-col items-center">
            <div class="flex mt-6 gap-6 text-center justify-space-around flex-wrap">
                <p>
                    <i class="fa-solid fa-earth-americas"></i>
                    <span>
                        English (United States)
                    </span>
                </p>
                <p>
                    Copy  right {{ new Date().getFullYear()}} @ Agile Vue  Inc.
                </p>

                <p>
                    Privacy · Terms · Advertising · Ad Choices · Cookies ·
                </p>

                <div class="text-black flex gap-2">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-linkedin"></i>
                </div>
            </div>
        </div>
    </div>
 </footer>
</template>

<script>
export default {
    name: "Footer"
}
</script>

<style scoped>

</style>

<style>
    .accordion-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
        /* Ubah durasi dan fungsi timing sesuai keinginan Anda */
    }

    /* .accordion-content:not(.hidden) {
        max-height: initial;
    } */
</style>

<section id="faq-section" class="max-w-6xl mx-auto py-16 md:px-8 px-4 xl:px-0">
    <div class="flex flex-col gap-y-7">
        <p class="flex items-center justify-center text-center font-medium text-emerald-400 font-['Poppins'] text-lg">
            Ask LearnWithAzhar
        </p>
        <h2 class="flex items-center justify-center text-center font-bold text-gray-900 font-['Poppins'] text-3xl">
            Frequently Asked
            <br>
            Questions 😊
        </h2>
        <div class="grid lg:grid-cols-2 gap-x-8 gap-y-8 mt-7">
            <div class="flex-col flex gap-y-8">
                @php $faqsLeft = $faqs->take($faqs->count() / 2); @endphp
                @foreach ($faqsLeft as $faq)
                    <div class="group faq-card shaynakit-accordion">
                        <div class="bg-white rounded-2xl p-5 flex flex-col gap-y-5">
                            <button class="btn-accordion">
                                <div class="flex flex-row justify-between">
                                    <h3 class="text-indigo-950 font-bold text-base">
                                        {{ $faq->judul }}
                                    </h3>
                                    <div
                                        class="bg-white w-[30px] h-[30px] items-center flex justify-center rounded-full">
                                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.44 6.7124L10.55 11.6024C9.9725 12.1799 9.0275 12.1799 8.45 11.6024L3.56 6.7124"
                                                stroke="#080C2E" stroke-width="2" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                            </button>
                            <div class="accordion-content hidden flex flex-col gap-y-5">
                                <p class="text-base text-gray-500 leading-loose">
                                    {{ $faq->isi }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex-col flex gap-y-8">
                @php $faqsRight = $faqs->slice($faqs->count() / 2); @endphp
                @foreach ($faqsRight as $faq)
                    <div class="group faq-card shaynakit-accordion">
                        <div class="bg-white rounded-2xl p-5 flex flex-col gap-y-5">
                            <button class="btn-accordion">
                                <div class="flex flex-row justify-between">
                                    <h3 class="text-indigo-950 font-bold text-base">
                                        {{ $faq->judul }}
                                    </h3>
                                    <div
                                        class="bg-white w-[30px] h-[30px] items-center flex justify-center rounded-full">
                                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.44 6.7124L10.55 11.6024C9.9725 12.1799 9.0275 12.1799 8.45 11.6024L3.56 6.7124"
                                                stroke="#080C2E" stroke-width="2" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                            </button>
                            <div class="accordion-content hidden flex flex-col gap-y-5">
                                <p class="text-base text-gray-500 leading-loose">
                                    {{ $faq->isi }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const accordionButtons = document.querySelectorAll('.btn-accordion');

            accordionButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    content.classList.toggle('hidden');
                    content.style.maxHeight = content.classList.contains('hidden') ? null : content.scrollHeight + 'px';
                });
            });
        });

    </script>
</section>


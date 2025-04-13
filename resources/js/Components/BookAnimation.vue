<template>
    <div class="book ">
        <div id="pages" class="pages left-20 text-black ">
            <div class="page text-primary" style="background-color: gray">
                <p>bro<span class="text-white">writers</span><br />Book!</p>
            </div>
            <div class="page grid place-items-center">
                <p style="color: black">₹5</p>
                <p style="color: gray">page 1</p>
            </div>
            <div class="page grid place-items-center">
                <p style="color: black">₹5</p>
                <p style="color: gray">page 2</p>
            </div>
            <div class="page grid place-items-center">
                <p style="color: black">₹5</p>
                <p style="color: gray">page 3</p>
            </div>
            <div class="page grid place-items-center">
                <p style="color: black">₹5</p>
                <p style="color: gray">page 4</p>
            </div>
            <div class="page grid place-items-center">
                <p style="color: black">₹5</p>
                <p style="color: gray">page 5</p>
            </div>
            <div class="page grid place-items-center">
                <p style="color: black">₹5</p>
                <p style="color: gray">page 6</p>
            </div>
            <div class="page grid place-items-center">
                <p style="color: black">₹5</p>
                <p style="color: gray">page 7</p>
            </div>
            <div class="page grid place-items-center">
                <p style="color: black">₹5</p>
                <p style="color: gray">page 8</p>
            </div>
            <div class="page grid place-items-center">
                <p style="color: black">₹5</p>
                <p style="color: gray">page 9</p>
            </div>
            <div class="page grid place-items-center">
                <p style="color: black">₹5</p>
                <p style="color: gray">page 10</p>
            </div>

            <div
                class="page grid place-items-center"
                style="background-color: grey"
            >
                bro
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, onUnmounted } from 'vue';

onMounted(() => {
    const pages = document.getElementsByClassName('page');

    // Set z-index based on page index
    for (let i = 0; i < pages.length; i++) {
        const page = pages[i];
        if (i % 2 === 0) {
            page.style.zIndex = pages.length - i;
        }
    }

    // Add page flip functionality
    for (let i = 0; i < pages.length; i++) {
        pages[i].pageNum = i + 1;
        pages[i].onclick = function () {
            if (this.pageNum % 2 === 0) {
                this.classList.remove('flipped');
                this.previousElementSibling.classList.remove('flipped');
            } else {
                this.classList.add('flipped');
                this.nextElementSibling.classList.add('flipped');
            }
        };
    }

    let currentPage = 0;
    let isForward = true;
    let flipInterval;

    const resetPages = () => {
        // Remove flipped class from all pages
        for (let i = 0; i < pages.length; i++) {
            pages[i].classList.remove('flipped');
        }
    };

    const startFlipping = () => {
        flipInterval = setInterval(() => {
            if (isForward) {
                // Forward flipping
                const page = pages[currentPage];
                if (page) {
                    if (currentPage % 2 === 0) {
                        page.classList.add('flipped');
                        if (page.nextElementSibling) {
                            page.nextElementSibling.classList.add('flipped');
                        }
                    }
                    currentPage += 2;

                    // If we reach the end, start flipping backwards
                    if (currentPage >= pages.length) {
                        isForward = false;
                        currentPage = pages.length - 1;
                    }
                }
            } else {
                // Backward flipping
                const page = pages[currentPage];
                if (page) {
                    if (currentPage % 2 === 1) {
                        page.classList.remove('flipped');
                        if (page.previousElementSibling) {
                            page.previousElementSibling.classList.remove(
                                'flipped',
                            );
                        }
                    }
                    currentPage -= 2;

                    // If we reach the start, reset and start forward again
                    if (currentPage < 0) {
                        isForward = true;
                        currentPage = 0;
                        resetPages();
                    }
                }
            }
        }, 500);
    };

    // Start the animation
    startFlipping();

    // Cleanup on component unmount
    onUnmounted(() => {
        if (flipInterval) {
            clearInterval(flipInterval);
        }
    });
});
</script>

<style scoped>
.book {
    transition: opacity 0.4s 0.2s;
}
p {
    margin-top: 8vw;
    text-align: center;
    font-size: 5vw;
    color: #e2b714;
}
.page {
    width: 30vw;
    height: 44vw;
    background-color: #111111;
    float: left;
    margin-bottom: 0.5em;
    background: left top no-repeat;
    background-size: cover;
}
.page:nth-child(even) {
    clear: both;
}
.book {
    perspective: 250vw;
}
.book .pages {
    width: 60vw;
    height: 44vw;
    position: relative;
    transform-style: preserve-3d;
    backface-visibility: hidden;
    border-radius: 4px;
}
.book .page {
    float: none;
    clear: none;
    margin: 0;
    position: absolute;
    top: 0;
    width: 30vw;
    height: 44vw;
    transform-origin: 0 0;
    transition: transform 1.4s;
    backface-visibility: hidden;
    transform-style: preserve-3d;
    cursor: pointer;
    user-select: none;
    background-color: whitesmoke;
}
.book .page:before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0);
    transition: background 0.7s;
    z-index: 2;
}
.book .page:nth-child(odd) {
    pointer-events: all;
    transform: rotateY(0deg);
    right: 0;
    border-radius: 0 4px 4px 0;
    background-image: linear-gradient(
        to right,
        rgba(0, 0, 0, 0.15) 0%,
        rgba(0, 0, 0, 0) 10%
    );
}
.book .page:nth-child(odd):hover {
    transform: rotateY(-15deg);
}
.book .page:nth-child(odd):hover:before {
    background: rgba(0, 0, 0, 0.03);
}
.book .page:nth-child(odd):before {
    background: rgba(0, 0, 0, 0);
}
.book .page:nth-child(even) {
    pointer-events: none;
    transform: rotateY(180deg);
    transform-origin: 100% 0;
    left: 0;
    border-radius: 4px 0 0 4px;
    background-image: linear-gradient(
        to left,
        rgba(0, 0, 0, 0.12) 0%,
        rgba(0, 0, 0, 0) 10%
    );
}
.book .page:nth-child(even):before {
    background: rgba(0, 0, 0, 0.2);
}
.book .page.grabbing {
    transition: none;
}
.book .page.flipped:nth-child(odd) {
    pointer-events: none;
    transform: rotateY(-180deg);
}
.book .page.flipped:nth-child(odd):before {
    background: rgba(0, 0, 0, 0.2);
}
.book .page.flipped:nth-child(even) {
    pointer-events: all;
    transform: rotateY(0deg);
}
.book .page.flipped:nth-child(even):hover {
    transform: rotateY(15deg);
}
.book .page.flipped:nth-child(even):hover:before {
    background: rgba(0, 0, 0, 0.03);
}
.book .page.flipped:nth-child(even):before {
    background: rgba(0, 0, 0, 0);
}
*,
* :before,
*:after {
    box-sizing: border-box;
}
.page:nth-child(odd) {
    background-position: right top;
}
.mybg {
    background-color: red;
}
</style>

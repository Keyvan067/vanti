<style>
    num-stepper {
        display: inline-flex;
        align-items: center;
        gap: 14px;
        background: #282828;
        border-radius: 999px;
        padding: 10px 16px 10px 20px;
        user-select: none;
    }
    num-stepper .val {
        font-size: 22px;
        font-weight: 600;
        color: #fff;
        min-width: 32px;
        text-align: center;
        font-variant-numeric: tabular-nums;
    }
    num-stepper .arrows {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
    num-stepper button {
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 2px 6px;
        color: #666;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: color .15s, background .15s;
        font-size: 13px;
        line-height: 1;
    }
    num-stepper button:hover { color: #fff; background: rgba(255,255,255,0.08); }
    num-stepper button:active { transform: scale(0.88); }
</style>

<template id="stepper-tpl">
    <span class="val"></span>
    <div class="arrows">
        <button type="button" data-dir="1"  aria-label="افزایش">▲</button>
        <button type="button" data-dir="-1" aria-label="کاهش">▼</button>
    </div>
    <input type="hidden" />
</template>



<script>
    class NumStepper extends HTMLElement {
        connectedCallback() {
            const tpl = document.getElementById('stepper-tpl').content.cloneNode(true);
            this.appendChild(tpl);

            this._val     = parseInt(this.getAttribute('value') ?? 0);
            this._min     = parseInt(this.getAttribute('min')   ?? 0);
            this._max     = parseInt(this.getAttribute('max')   ?? 99);

            this._display = this.querySelector('.val');
            this._input   = this.querySelector('input');
            this._input.name = this.getAttribute('name') ?? 'quantity';

            this.querySelectorAll('button').forEach(btn =>
                btn.addEventListener('click', () => this._step(+btn.dataset.dir))
            );

            this._render();
        }

        _step(dir) {
            this._val = Math.min(this._max, Math.max(this._min, this._val + dir));
            this._render();
        }

        _render() {
            this._display.textContent = this._val;
            this._input.value = this._val;
        }
    }

    customElements.define('num-stepper', NumStepper);
</script><?php

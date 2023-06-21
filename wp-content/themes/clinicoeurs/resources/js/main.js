const equipes = document.querySelectorAll(".equipe__nom");
const equipesclowns = document.querySelectorAll(".equipe__wrapper--cliniclowns");
const equipesjuniors = document.querySelectorAll(".equipe__wrapper--clinicoeurs");
const equipessnoezs = document.querySelectorAll(".equipe__wrapper--clinisnoezs");
const equipestalents = document.querySelectorAll(".equipe__wrapper--clinitalents");
const equipesall = document.querySelectorAll(".equipe__wrapper--all");

equipes.forEach(equipe => {
    equipe.addEventListener('click', (e) => {
        if (equipe.textContent === "Clinitalents") {

            if (equipestalents[0].classList.contains('hidden')) {
                equipestalents[0].classList.remove('hidden')
            }
            if (!equipessnoezs[0].classList.contains('hidden')) {
                equipessnoezs[0].classList.add('hidden')
            }
            if (!equipesjuniors[0].classList.contains('hidden')) {
                equipesjuniors[0].classList.add('hidden')
            }
            if (!equipesclowns[0].classList.contains('hidden')) {
                equipesclowns[0].classList.add('hidden')
            }
            if (!equipesall[0].classList.contains('hidden')) {
                equipesall[0].classList.add('hidden')
            }

        } else if (equipe.textContent === "Clinisnoezs") {

            if (equipessnoezs[0].classList.contains('hidden')) {
                equipessnoezs[0].classList.remove('hidden')
            }
            if (!equipesall[0].classList.contains('hidden')) {
                equipesall[0].classList.add('hidden')
            }
            if (!equipesjuniors[0].classList.contains('hidden')) {
                equipesjuniors[0].classList.add('hidden')
            }
            if (!equipesclowns[0].classList.contains('hidden')) {
                equipesclowns[0].classList.add('hidden')
            }
            if (!equipestalents[0].classList.contains('hidden')) {
                equipestalents[0].classList.add('hidden')
            }

        } else if (equipe.textContent === "Clinijuniors") {

            if (equipesjuniors[0].classList.contains('hidden')) {
                equipesjuniors[0].classList.remove('hidden')
            }
            if (!equipessnoezs[0].classList.contains('hidden')) {
                equipessnoezs[0].classList.add('hidden')
            }
            if (!equipesall[0].classList.contains('hidden')) {
                equipesall[0].classList.add('hidden')
            }
            if (!equipesclowns[0].classList.contains('hidden')) {
                equipesclowns[0].classList.add('hidden')
            }
            if (!equipestalents[0].classList.contains('hidden')) {
                equipestalents[0].classList.add('hidden')
            }

        } else if (equipe.textContent === "Clinilowns") {

            if (equipesclowns[0].classList.contains('hidden')) {
                equipesclowns[0].classList.remove('hidden')
            }
            if (!equipessnoezs[0].classList.contains('hidden')) {
                equipessnoezs[0].classList.add('hidden')
            }
            if (!equipesjuniors[0].classList.contains('hidden')) {
                equipesjuniors[0].classList.add('hidden')
            }
            if (!equipesall[0].classList.contains('hidden')) {
                equipesall[0].classList.add('hidden')
            }
            if (!equipestalents[0].classList.contains('hidden')) {
                equipestalents[0].classList.add('hidden')
            }
        } else if (equipe.textContent === "Tous") {
            if (equipesall[0].classList.contains('hidden')) {
                equipesall[0].classList.remove('hidden')
            }
            if (!equipessnoezs[0].classList.contains('hidden')) {
                equipessnoezs[0].classList.add('hidden')
            }
            if (!equipesjuniors[0].classList.contains('hidden')) {
                equipesjuniors[0].classList.add('hidden')
            }
            if (!equipesclowns[0].classList.contains('hidden')) {
                equipesclowns[0].classList.add('hidden')
            }
            if (!equipestalents[0].classList.contains('hidden')) {
                equipestalents[0].classList.add('hidden')
            }
        }
    })
})

class Clinicoeurs_Controller {
    constructor() {
        this.body = document.body
    }

    static run() {
        document.body.classList.add('js-enabled');
        let options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5,
        }

        let aTargets = document.querySelectorAll('.slide-in');
        let observer = new IntersectionObserver(callback, options);
        for (const target of aTargets) {
            observer.observe(target);
            target.addEventListener('load', (event) => {
            })
        }

        function callback(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }
    }
}

Clinicoeurs_Controller.run();
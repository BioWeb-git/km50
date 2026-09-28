var hideDataFrontEndHelper = function(){
    $('html *').removeAttr("data-frontend-helper");
    $('body').click(function() {
        $('.rsfh-lightbox-close').text("Fermer");
        $('.rsfh-lightbox-cancel').text("Annuler");
    });
};
var scrollClass = function(){
    var y = $(this).scrollTop();
    if (y > 200) {
        $("body").addClass("scroll");
    } else {
        $("body").removeClass("scroll");
    }
}
var scrollAnchor = function(){
    // Assign the HTML, Body as a variable...
    $viewport = $('html, body');

    $(".link-animate a, .link-animate").click(function (event) {
        //prevent the default action for the click event
        event.preventDefault();

        //get the full url - like mysitecom/index.htm#home
        var full_url = this.href;

        //split the url by # and get the anchor target name - home in mysitecom/index.htm#home
        var parts = full_url.split("#");
        var trgt = parts[1];

        //get the top offset of the target anchor
        var offset_value = $(".header-navigation").outerHeight() - 1;
        var target_offset = $("#" + trgt).offset();
        var target_top = target_offset.top - offset_value;

        //goto that anchor by setting the body scroll top to anchor top
        // EASES CURVES > https://jqueryui.com/resources/demos/effect/easing.html
        $viewport.animate({scrollTop: target_top}, 500, 'swing');

        $viewport.bind("scroll mousedown DOMMouseScroll mousewheel keyup", function () {
            $viewport.stop();
        });
    });
};
$(document).ready(function () {
    scrollAnchor();
    scrollClass();
    initVoyagesStatusFilter();
});

$(window).on('load', function () {
    hideDataFrontEndHelper();
});

$(window).scroll(function () {
    scrollClass();
});

// =========================================================================
// MODE PRÉVISUALISATION KM50 (Option 2B)
// Activé via ?preview=1 (persisté dans localStorage pour votre navigation)
// Désactivé via ?preview=0
// =========================================================================
var isKm50PreviewMode = function() {
    try {
        var params = new URLSearchParams(window.location.search);
        if (params.get('preview') === '1') {
            localStorage.setItem('km50_preview_active', '1');
        } else if (params.get('preview') === '0') {
            localStorage.removeItem('km50_preview_active');
        }
        var active = localStorage.getItem('km50_preview_active') === '1';
        if (active) {
            $('body').addClass('km50-preview');
        } else {
            $('body').removeClass('km50-preview');
        }
        return active;
    } catch(e) {
        return false;
    }
};

// Helper pour récupérer le statut/hash actif des voyages
var getActiveVoyageHash = function() {
    if (!isKm50PreviewMode()) return '';
    var $activeBtn = $('.voyages-status-filter .btn-status-filter.is-active');
    var status = $activeBtn.length ? $activeBtn.data('status') : '';
    if (!status && window.location.hash) {
        var h = window.location.hash.toLowerCase();
        if (h === '#past' || h === '#passes') status = 'past';
        else if (h === '#all' || h === '#tous') status = 'all';
    }
    if (status === 'past') return '#past';
    if (status === 'all') return '#all';
    return '';
};

// Redirection pour les filtres de catégories dé-crawlisés (base64) avec conservation de l'onglet actif en preview
document.addEventListener('click', function(e) {
    const el = e.target.closest('.js-cat-link');
    if (el && el.dataset.href) {
        var targetUrl = atob(el.dataset.href).split('#')[0];
        if (isKm50PreviewMode()) {
            var hash = getActiveVoyageHash();
            if (hash) {
                targetUrl += hash;
            }
        }
        window.location.href = targetUrl;
    }
});
document.addEventListener('keydown', function(e) {
    const el = e.target.closest('.js-cat-link');
    if (el && el.dataset.href && (e.key === 'Enter' || e.key === ' ')) {
        e.preventDefault();
        var targetUrl = atob(el.dataset.href).split('#')[0];
        if (isKm50PreviewMode()) {
            var hash = getActiveVoyageHash();
            if (hash) {
                targetUrl += hash;
            }
        }
        window.location.href = targetUrl;
    }
});

// =========================================================================
// FILTRAGE DYNAMIQUE DES SÉJOURS (Option 2B : Onglets Disponibles / Passés)
// =========================================================================
var initVoyagesStatusFilter = function() {
    var preview = isKm50PreviewMode();

    var $list = $('.mod_newslist.voyages-list, .voyages-list');
    if (!$list.length) return;

    var $cards = $list.find('.voyages-master');
    if (!$cards.length) return;

    // Si le mode preview n'est pas actif : on retire tout filtre et on laisse tout affiché normalement
    if (!preview) {
        $('.voyages-status-filter, .voyages-empty-message').remove();
        $cards.show();
        return;
    }

    var now = new Date();

    // Nettoyage de tout ancien sessionStorage pour éviter les effets de bord
    try { sessionStorage.removeItem('km50_voyage_status'); } catch(e) {}

    // 1. Détection et attribution du statut sur chaque carte (avec fallback JS si non rendu par le serveur)
    $cards.each(function() {
        var $card = $(this);
        var status = $card.attr('data-status');

        if (!status) {
            // Lecture de la date d'inscription affichée dans la tuile
            var dateText = $card.find('.voyage-info-tile.-inscription span').text();
            var match = dateText.match(/(\d{2})\/(\d{2})\/(\d{4})/);

            if (match) {
                var deadline = new Date(parseInt(match[3], 10), parseInt(match[2], 10) - 1, parseInt(match[1], 10), 23, 59, 59);
                status = (deadline.getTime() < now.getTime()) ? 'past' : 'upcoming';
            } else {
                status = 'upcoming';
            }

            $card.attr('data-status', status).addClass('status-' + status);
        }

        // En mode preview, adapter le libellé du bouton pour les séjours passés
        if ($card.attr('data-status') === 'past') {
            $card.find('a.button').text('Voir le séjour');
        }
    });

    // 2. Comptage précis après analyse
    var countUpcoming = $cards.filter('[data-status="upcoming"]').length;
    var countPast     = $cards.filter('[data-status="past"]').length;
    var countAll      = $cards.length;

    // 3. Construction de la barre d'onglets (avec bandeau discret de rappel de prévisualisation)
    var filterHtml = [
        '<div class="voyages-status-filter" role="tablist" aria-label="Filtrer les séjours par statut">',
        '  <button type="button" role="tab" class="btn-status-filter" data-status="upcoming" aria-selected="false">',
        '    Séjours disponibles <span class="badge-count">' + countUpcoming + '</span>',
        '  </button>',
        '  <button type="button" role="tab" class="btn-status-filter" data-status="past" aria-selected="false">',
        '    Séjours passés <span class="badge-count">' + countPast + '</span>',
        '  </button>',
        '  <button type="button" role="tab" class="btn-status-filter" data-status="all" aria-selected="false">',
        '    Tous les séjours <span class="badge-count">' + countAll + '</span>',
        '  </button>',
        '  <span style="font-size: 0.75em; color: #999; margin-left: auto; align-self: center;">[Mode dev actif &bull; <a href="?preview=0" style="color: #999; text-decoration: underline;">désactiver</a>]</span>',
        '</div>',
        '<div class="voyages-empty-message" style="display:none;">',
        '  <p class="empty-msg-text">Aucun séjour disponible pour cette catégorie pour le moment.</p>',
        '  <button type="button" class="btn-status-filter is-active js-show-past" style="display:none; margin-top: 15px; cursor: pointer;">Consulter les séjours passés</button>',
        '</div>'
    ].join('\n');

    // 4. Insertion en amont de la liste (hors de la grille CSS)
    $('.voyages-status-filter, .voyages-empty-message').remove(); // Évite tout doublon
    var $filterBar = $(filterHtml).insertBefore($list);
    var $emptyMsg = $('.voyages-empty-message');

    // 5. Fonction d'application du filtre
    var applyFilter = function(status, updateHash) {
        $filterBar.find('.btn-status-filter').removeClass('is-active').attr('aria-selected', 'false');
        $filterBar.find('.btn-status-filter[data-status="' + status + '"]').addClass('is-active').attr('aria-selected', 'true');

        var visibleCount = 0;
        $cards.each(function() {
            var cardStatus = $(this).attr('data-status') || 'upcoming';
            if (status === 'all' || cardStatus === status) {
                $(this).stop(true, true).fadeIn(150);
                visibleCount++;
            } else {
                $(this).stop(true, true).hide();
            }
        });

        if (visibleCount === 0) {
            if (status === 'upcoming') {
                $emptyMsg.find('.empty-msg-text').text('Aucun séjour disponible pour cette catégorie pour le moment.');
                if (countPast > 0) {
                    $emptyMsg.find('.js-show-past').text('Consulter les séjours passés (' + countPast + ')').show();
                } else {
                    $emptyMsg.find('.js-show-past').hide();
                }
            } else if (status === 'past') {
                $emptyMsg.find('.empty-msg-text').text('Aucun séjour passé pour cette catégorie.');
                $emptyMsg.find('.js-show-past').hide();
            } else {
                $emptyMsg.find('.empty-msg-text').text('Aucun séjour pour cette catégorie.');
                $emptyMsg.find('.js-show-past').hide();
            }
            $emptyMsg.stop(true, true).fadeIn(150);
        } else {
            $emptyMsg.hide();
        }

        // Maintien du hash dans l'URL du navigateur si demandé explicitement
        if (updateHash) {
            var newHash = (status === 'past') ? '#past' : ((status === 'all') ? '#all' : '');
            if (window.history && window.history.replaceState) {
                var cleanUrl = window.location.pathname + window.location.search + newHash;
                window.history.replaceState(null, null, cleanUrl);
            }
        }
    };

    // Gestion du clic sur les boutons d'onglets
    $filterBar.on('click', '.btn-status-filter', function(e) {
        e.preventDefault();
        var status = $(this).data('status');
        applyFilter(status, true);
    });

    // Clic sur le bouton de secours dans le message vide
    $emptyMsg.on('click', '.js-show-past', function(e) {
        e.preventDefault();
        applyFilter('past', true);
    });

    // Sélection de l'onglet actif au chargement :
    // L'URL (hash) est la seule source de vérité. Sans hash, on affiche les séjours disponibles.
    var hash = (window.location.hash || '').toLowerCase();
    var defaultStatus = 'upcoming';

    if (hash === '#past' || hash === '#passes' || hash === '#passe') {
        defaultStatus = 'past';
    } else if (hash === '#all' || hash === '#tous') {
        defaultStatus = 'all';
    }

    applyFilter(defaultStatus, false);
};
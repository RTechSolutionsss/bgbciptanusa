import { useSSRContext, resolveComponent, mergeProps, withCtx, createVNode } from "vue";
import { ssrRenderAttr, ssrRenderComponent, ssrRenderStyle } from "vue/server-renderer";
import { _ as _sfc_main$2 } from "./AppLayout-30f2904b.mjs";
import "./ApplicationLogo-8b847249.mjs";
import "@inertiajs/inertia";
import "@inertiajs/inertia-vue3";
import "./_plugin-vue_export-helper-cc2b3d55.mjs";
import "./ResponsiveNavLink-1800b15f.mjs";
import "@inertiajs/vue3";
const __default__ = {
  // components: {
  //     AppLayout,
  //     Welcome,
  //     Pagination,
  //     Link,
  // },
  // props: {
  //     undangan: Object, // <- nama props yang dibuat di controller saat parsing data
  //     hadir: String,
  //     kehadiran: String,
  //     konfirmasikehadiran: String,
  //     jumlahorang: String,
  //     tidakhadir: String,
  //     belumisi: String,
  // },
  // setup() {
  //     //define state search
  //     const search = ref(
  //         "" || new URL(document.location).searchParams.get("q")
  //     );
  //     //define method search
  //     const handleSearch = () => {
  //         Inertia.get("/invitation", {
  //             //send params "q" with value from state "search"
  //             q: search.value,
  //         });
  //     };
  //     return {
  //         search,
  //         handleSearch,
  //     };
  // },
  data() {
    return {
      editMode: false,
      isOpen: false,
      form: {
        name: null,
        konfirmasikehadiran: null,
        kehadiran: null,
        sound: null
      }
    };
  },
  methods: {
    openModal: function() {
      this.isOpen = true;
    },
    closeModal: function() {
      this.isOpen = false;
      this.reset();
      this.editMode = false;
    },
    reset: function() {
      this.form = {
        name: null,
        konfirmasikehadiran: null,
        kehadiran: null,
        sound: true
      };
    },
    save: function(undangan) {
      this.$inertia.post("/invitation", undangan);
      this.reset();
      this.closeModal();
      this.editMode = false;
    },
    edit: function(undangan) {
      this.form = Object.assign({}, undangan);
      this.editMode = true;
      this.openModal();
    },
    update: function(undangan) {
      undangan._method = "PUT";
      this.$inertia.post("/invitation/" + undangan.id, undangan);
      this.reset();
      this.closeModal();
    },
    deleteRow: function(undangan) {
      if (!confirm("Are you sure want to remove?"))
        return;
      undangan._method = "DELETE";
      this.$inertia.post("/invitation/" + undangan.id, undangan);
      this.reset();
      this.closeModal();
    }
  }
};
const _sfc_main$1 = /* @__PURE__ */ Object.assign(__default__, {
  __name: "Katalog",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Link = resolveComponent("Link");
      _push(`<!--[--><div class="sm:px-6 ml-4 mb-4"><div class="p-6"><div class="mt-8 flex justify-between"><p class="font-bold text-4xl">Katalog</p></div></div><div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2"><div class="flex justify-between"><form><div class="input-group mb-3"><input type="text" class="form-control"${ssrRenderAttr("value", _ctx.search)} placeholder="search by product name..."><button class="btn btn-primary input-group-text" type="submit"><i class="fa fa-search me-2"></i> SEARCH </button></div></form></div></div><div><table class="table-fixed w-full table-responsive"><thead><tr class="bg-gray-100"><th class="px-4 py-2 w-20">No.</th><th class="px-4 py-2">ForSales</th><th class="px-4 py-2">Attachment</th><th class="px-4 py-2">Date</th><th class="px-4 py-2">Action</th></tr></thead><tbody><tr class="text-center"><td class="border px-4 py-2"></td><td class="border px-4 py-2"></td><td class="border px-4 py-2"></td><td class="border px-4 py-2">`);
      _push(ssrRenderComponent(_component_Link, { href: `` }, null, _parent));
      _push(`</td><td class="border px-4 py-2"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Edit </button><button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"> Delete </button></td></tr></tbody></table></div></div>`);
      if (_ctx.isOpen) {
        _push(`<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400"><div class="flex items-end justify-center min-h-screen pb-20 text-center sm:block sm:p-0"><div class="fixed inset-0 transition-opacity"><div class="absolute inset-0 bg-gray-500 opacity-75"></div></div><span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​ <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline"><form><div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4"><div class=""><div class="mb-4"><label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Name:</label><input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Name"${ssrRenderAttr("value", _ctx.form.name)}></div><div class="mb-4"><label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Kehadiran:</label><input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter kehadiran"${ssrRenderAttr("value", _ctx.form.kehadiran)}></div><div class="mb-4"><label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Kehadiran:</label><input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter konfirmasikehadiran"${ssrRenderAttr(
          "value",
          _ctx.form.konfirmasikehadiran
        )}></div></div></div><div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"><span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto"><button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" style="${ssrRenderStyle(!_ctx.editMode ? null : { display: "none" })}"> Save </button></span><span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto"><button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" style="${ssrRenderStyle(_ctx.editMode ? null : { display: "none" })}"> Update </button></span><span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto"><button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"> Cancel </button></span></div></form></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<!--]-->`);
    };
  }
});
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Katalog.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "Katalog",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(ssrRenderComponent(_sfc_main$2, mergeProps({ title: "Log Activity" }, _attrs), {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h2 class="font-semibold text-xl text-gray-800 leading-tight"${_scopeId}> Log Activity </h2>`);
          } else {
            return [
              createVNode("h2", { class: "font-semibold text-xl text-gray-800 leading-tight" }, " Log Activity ")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="py-12 sm:py-1"${_scopeId}><div class="max-w-7xl mx-auto sm:pr-6 sm:pl-52"${_scopeId}><div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"${_scopeId}>`);
            _push2(ssrRenderComponent(_sfc_main$1, null, null, _parent2, _scopeId));
            _push2(`</div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "py-12 sm:py-1" }, [
                createVNode("div", { class: "max-w-7xl mx-auto sm:pr-6 sm:pl-52" }, [
                  createVNode("div", { class: "bg-white overflow-hidden shadow-xl sm:rounded-lg" }, [
                    createVNode(_sfc_main$1)
                  ])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Katalog.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};

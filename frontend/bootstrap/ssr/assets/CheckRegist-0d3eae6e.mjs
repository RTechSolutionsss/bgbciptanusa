import { useSSRContext, mergeProps, withCtx, createVNode } from "vue";
import { ssrRenderAttrs, ssrRenderAttr, ssrRenderComponent } from "vue/server-renderer";
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
  __name: "CheckRegister",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "sm:px-6 ml-4 mb-4" }, _attrs))}><div class="p-6"><div class="mt-8 flex justify-between"><p class="font-bold text-4xl">List Akun Baru</p></div></div><div class="flex justify-between"><form><div class="input-group mb-3"><input type="text" class="form-control"${ssrRenderAttr("value", _ctx.search)} placeholder="search by product name..."><button class="btn btn-primary input-group-text" type="submit"><i class="fa fa-search me-2"></i> SEARCH </button></div></form></div><div class="grid grid-cols-1 md:grid-cols-2"><div class="bg-gray-200 bg-opacity-25 rounded-md w-4xl m-3"><div class="flex justify-between p-4"><p>Customer</p><p>Date</p></div><div class="mt-4"><h2 class="text-xl uppercase px-4">PT SUKA SUKA GW</h2><p class="text-sm uppercase px-4 mt-3">Vie E-Mail {E-mail Customer}</p></div><div class="mt-8 mb-4"><div class="flex justify-center"><button class="btn bg-indigo-600 mx-4 input-group-text rounded-lg p-3 text-white" type="submit"> Terima </button><button class="btn bg-red-600 mx-4 input-group-text rounded-lg p-3 text-white" type="submit"> Tolak </button></div></div></div><div class="bg-gray-200 bg-opacity-25 rounded-md w-4xl m-3"><div class="flex justify-between p-4"><p>Customer</p><p>Date</p></div><div class="mt-4"><h2 class="text-xl uppercase px-4">PT SUKA SUKA GW</h2><p class="text-sm uppercase px-4 mt-3">Vie E-Mail {E-mail Customer}</p></div><div class="mt-8 mb-4"><div class="flex justify-center"><button class="btn bg-indigo-600 mx-4 input-group-text rounded-lg p-3 text-white" type="submit"> Terima </button><button class="btn bg-red-600 mx-4 input-group-text rounded-lg p-3 text-white" type="submit"> Tolak </button></div></div></div><div class="bg-gray-200 bg-opacity-25 rounded-md w-4xl m-3"><div class="flex justify-between p-4"><p>Customer</p><p>Date</p></div><div class="mt-4"><h2 class="text-xl uppercase px-4">PT SUKA SUKA GW</h2><p class="text-sm uppercase px-4 mt-3">Vie E-Mail {E-mail Customer}</p></div><div class="mt-8 mb-4"><div class="flex justify-center"><button class="btn bg-indigo-600 mx-4 input-group-text rounded-lg p-3 text-white" type="submit"> Terima </button><button class="btn bg-red-600 mx-4 input-group-text rounded-lg p-3 text-white" type="submit"> Tolak </button></div></div></div></div></div>`);
    };
  }
});
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/CheckRegister.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "CheckRegist",
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/CheckRegist.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};

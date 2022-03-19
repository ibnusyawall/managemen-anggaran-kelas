import Vue from "vue";
import Router from "vue-router";

Vue.use(Router);

const router = new Router({
    mode: "history",
    base: process.env.BASE_URL,

    routes: [
        {
            path: "/admin",
            component: () => import("./../layouts/full-layout/FullLayout"),
            meta: { requireAuth: true },
            children: [
                {
                    name: "admin-dashboard",
                    path: "/admin",
                    component: () => import("./../views/Admin/Dashboard"),
                },
                {
                    name: "uang-masuk",
                    path: "/admin/manage/uang-masuk",
                    component: () => import("./../views/UangMasuk/Dashboard"),
                },
                {
                    name: "uang-keluar",
                    path: "/admin/manage/uang-keluar",
                    component: () => import("./../views/UangKeluar/Dashboard"),
                },
            ]
        },
        {
            name: 'Login',
            path: '/login',
            component: () => import("./../views/Auth/Login")
        },
        {
            name: 'NotFound',
            path: '*',
            component: () => import("./../views/404")
        },
    ],
});

router.beforeEach(async (to, from, next) => {
    var token = localStorage.getItem('token')
    var user = JSON.parse(localStorage.getItem('user'))
    console.log('user', user)

    try {
        var checkLogin = await check()
        var isAuth = to.matched.some(record => record.meta.requireAuth)

        var cek = !!checkLogin
        if (isAuth && !cek) {
            next({
                name: 'Login',
                query: {
                    redirect: to.fullPath
                }
            })
        }
        next()
    } catch (e) {
        console.log(e)
    }
})

function check() {
    return new Promise(resolve => {
        axios.get('/api/user')
            .then(res => {
                var user = JSON.stringify(res.data)
                localStorage.setItem('user', user)
                console.log(res?.data)
                resolve(true)
            }).catch(e => {
                console.log(e)
                resolve(false)
            })
    })
}

export default router;

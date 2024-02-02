package main

/*
* YesWeHack - Vulnerable code snippets
*/

import (
	"fmt"
	"net/http"
	"strings"
)

type Headers struct {
	ClientIP string
	Role     *http.Cookie
}

func main() {
	http.HandleFunc("/",
		func(w http.ResponseWriter, r *http.Request) {
			fmt.Fprintln(w, "To access as admin you need to have a role as \"admin\" and be on the localhost system.")
		})

	http.HandleFunc("/admin",
		func(w http.ResponseWriter, r *http.Request) {
			
      		//Client checks:
			h := &Headers{}
			h.Role, _ = r.Cookie("role")
			h.ClientIP = r.Header.Get("X-Forwarded-For")

			//Render HTML
			fmt.Fprintln(w, html())

			if strings.ToLower(h.Role.Value) == "admin" {
				for _, host := range []string{"127.0.0.1", "localhost"} {
					if host == strings.Split(h.ClientIP, ":")[0] {
						fmt.Fprintln(w, html_AdminDashboard())
					}
				}
			}
		})
	//Start web server
	run()
}

func html() string {
	return "<p>Welcome we verify that your an administrator, wait...</p>"
}

func html_AdminDashboard() string {
	return "<h1>Logging in...</h1>"
	//Loading Admin dashboard content...
	//Code..
}

func run() {
	port := 1337
	addr := fmt.Sprintf("0.0.0.0:%d", port)
	fmt.Printf("Server listening on : http://%s\n", addr)
	http.ListenAndServe(addr, nil)
}

package main

/*
* YesWeHack - Vulnerable code snippets
*/

/** Run the code snippet
* COMMAND: go run 5-BrokenAuth.go
*/
import (
	"fmt"
	"log"
	"net/http"
	"strings"
)

func main() {
	type Headers struct {
		ClientIP string
		Role     *http.Cookie
	}

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
	run() //Start server
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
	fmt.Printf("Starting server at port http://127.0.0.1:5000\n")
	if err := http.ListenAndServe(":5000", nil); err != nil {
		log.Fatal(err)
	}
}

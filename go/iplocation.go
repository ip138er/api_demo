package main

import (
	"encoding/json"
	"encoding/xml"
	"fmt"
	"io/ioutil"
	"net/http"
)

const (
	URL   = "http://api.ip138.com/query/"
	TOKEN = "bd4c2bf9a38ab06f7cae88c9759ee172"
)

//----------------------------------
// IP地址调用示例代码
//----------------------------------

// xml struct
type xmlinfo struct {
	Ret  string          `xml:"ret"`
	Ip   string          `xml:"ip"`
	Data locationxmlInfo `xml:"data"`
}

type locationxmlInfo struct {
	Country string `xml:"country"`
	Region  string `xml:"region"`
	City    string `xml:"city"`
	Isp     string `xml:"isp"`
}

//json struct
type jsoninfo struct {
	Ret  string    `json:"ret"`
	Ip   string    `json:"ip"`
	Data [4]string `json:"data"`
}

func main() {
	ipLocation("8.8.8.8", "xml")
}

func ipLocation(ip string, dataType string) {

	queryUrl := fmt.Sprintf("%s?ip=%s&datatype=%s", URL, ip, dataType)
	client := &http.Client{}
	reqest, err := http.NewRequest("GET", queryUrl, nil)

	if err != nil {
		fmt.Println("Fatal error ", err.Error())
	}

	reqest.Header.Add("token", TOKEN)
	response, err := client.Do(reqest)
	defer response.Body.Close()

	if err != nil {
		fmt.Println("Fatal error ", err.Error())
	}
	if response.StatusCode == 200 {
		bodyByte, _ := ioutil.ReadAll(response.Body)

		if dataType == "jsonp" {
			var info jsoninfo
			json.Unmarshal(bodyByte, &info)
			fmt.Println(info.Ip)
		} else if dataType == "xml" {
			var info xmlinfo
			xml.Unmarshal(bodyByte, &info)
			fmt.Println(info.Ip)
		}
	}

	return
}

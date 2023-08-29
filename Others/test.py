import openai
import time
# import json
openai.api_key = "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"
# indian_states = ["Punjab",  "Rajasthan",    "Sikkim",    "Tamil Nadu",    "Telangana",    "Tripura",    "Uttar Pradesh",    "Uttarakhand",    "West Bengal",    "Andaman and Nicobar Islands",    "Chandigarh",    "Dadra and Nagar Haveli and Daman and Diu",    "Lakshadweep",    "Delhi",    "Puducherry"]
indian_states = ["Puducherry"];
# "Andhra Pradesh",    "Arunachal Pradesh",    "Assam",    "Bihar",    "Chhattisgarh",    "Goa",   "Gujarat",    "Haryana",    "Himachal Pradesh",    "Jharkhand",    "Karnataka",    "Kerala",    "Madhya Pradesh",    "Maharashtra",    "Manipur",    "Meghalaya",    "Mizoram",    "Nagaland",    "Odisha",   
for i in range(len(indian_states)):
    str = "{ state : \"" + indian_states[i] + "\", cities : [";
    pos = i +1;
    print(pos , " " , indian_states[i]);
    prompt = "give all city names of " + indian_states[i] + " without any numbering and seperated by comma";
    completions = openai.Completion.create(
        engine="text-davinci-002",
        prompt=prompt,
        max_tokens=3000,
        n=1,
        stop=None,
        temperature=0.5,
    )
    message = completions.choices[0].text
    city = message.split(',');
    print("Total Cities : " , len(city)+1);
    ind = 1;
    for x in city:
        city_name = "";
        for j in range(0,len(x)):
            if x[j]>='a' and x[j]<='z' or x[j]>='A' and x[j]<='Z':
                city_name += x[j];
        str += "{ name : " + "\"" + city_name + "\", areas : [";
        print("\t" , ind , " " , city_name)
        ind += 1;
        prom = "give all suburb of " + city_name + " in " + indian_states[i] + " without any numbering and seperated by comma";
        completions = openai.Completion.create(
            engine="text-davinci-002",
            prompt=prom,
            max_tokens=3000,
            n=1,
            stop=None,
            temperature=0.5,
        )
        message = completions.choices[0].text
        areas = message.split(',');
        for z in areas:
            area_name = "";
            flag = 0;
            for k in range(0,len(z)):
                if z[k] >= 'a' and z[k]<='z' or z[k]>='A' and z[k]<='Z' :
                    flag = 1;
                if flag == 1:
                    area_name += z[k];
            str += "\"" + area_name + "\","
        str += "]},"
        print("--------------------------------------------------------------------------------------------------------------");
        time.sleep(20);
        print("--------------------------------------------------------------------------------------------------------------");
    str += "]},";
    with open('test.txt', 'a') as f:
        f.write(str)
        f.write('\n')
    str = "";
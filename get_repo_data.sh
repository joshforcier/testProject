printf '%s\n' NAME URL LICENSE | paste -sd ',' >> repo_data.csv
while read repos; do
  rpm -q $repos --queryformat "%{NAME};%{URL};%{LICENSE}\n" | sort -t\; -k 1 >> repo_data.csv
done <repo_list.txt
